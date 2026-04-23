<?php

namespace Frooxi\Shop\Http\Controllers\Customer;

use Cookie;
use Frooxi\Customer\Repositories\CustomerGroupRepository;
use Frooxi\Customer\Repositories\CustomerRepository;
use Frooxi\Customer\Services\OtpService;
use Frooxi\Shop\Http\Controllers\Controller;
use Frooxi\Shop\Http\Requests\Customer\RegistrationRequest;
use Frooxi\Shop\Mail\Customer\EmailVerificationNotification;
use Frooxi\Shop\Mail\Customer\RegistrationNotification;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Event;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Str;
use Illuminate\View\View;

class RegistrationController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct(
        protected CustomerRepository $customerRepository,
        protected CustomerGroupRepository $customerGroupRepository,
        protected OtpService $otpService,
    ) {}

    /**
     * Opens up the user's sign up form.
     *
     * @return View
     */
    public function index()
    {
        return view('shop::customers.sign-up');
    }

    /**
     * Method to store user's sign up form data to DB.
     *
     * @return Response
     */
    public function store(RegistrationRequest $registrationRequest)
    {
        $customerGroup = core()->getConfigData('customer.settings.create_new_account_options.default_group');

        $data = array_merge($registrationRequest->only([
            'first_name',
            'last_name',
            'phone',
            'email',
            'password_confirmation',
        ]), [
            'password' => bcrypt(request()->input('password')),
            'api_token' => Str::random(80),
            'is_verified' => 0,
            'customer_group_id' => $this->customerGroupRepository->findOneWhere(['code' => $customerGroup])->id,
            'channel_id' => core()->getCurrentChannel()->id,
            'token' => md5(uniqid(rand(), true)),
        ]);

        Event::dispatch('customer.registration.before');

        $customer = $this->customerRepository->create($data);

        if (! $this->otpService->generateAndSend($customer->phone)) {
            session()->flash('error', 'We could not send the verification code. Please try again later.');

            return redirect()->back()->withInput();
        }

        session()->put('otp_customer_id', $customer->id);

        Event::dispatch('customer.create.after', $customer);

        Event::dispatch('customer.registration.after', $customer);

        return redirect()->route('shop.customers.verify-otp');
    }

    /**
     * Method to verify account.
     *
     * @param  string  $token
     * @return Response
     */
    public function verifyAccount($token)
    {
        $customer = $this->customerRepository->findOneByField('token', $token);

        if ($customer) {
            $this->customerRepository->update([
                'is_verified' => 1,
                'token' => null,
            ], $customer->id);

            if ((bool) core()->getConfigData('emails.general.notifications.emails.general.notifications.registration')) {
                Mail::queue(new RegistrationNotification($customer));
            }

            $this->customerRepository->syncNewRegisteredCustomerInformation($customer);

            session()->flash('success', trans('shop::app.customers.signup-form.verified'));
        } else {
            session()->flash('warning', trans('shop::app.customers.signup-form.verify-failed'));
        }

        return redirect()->route('shop.customer.session.index');
    }

    /**
     * Resend verification email.
     *
     * @param  string  $email
     * @return Response
     */
    public function resendVerificationEmail($email)
    {
        $verificationData = [
            'email' => $email,
            'token' => md5(uniqid(rand(), true)),
        ];

        $customer = $this->customerRepository->findOneByField('email', $email);

        $this->customerRepository->update(['token' => $verificationData['token']], $customer->id);

        try {
            Mail::queue(new EmailVerificationNotification($verificationData));

            if (Cookie::has('enable-resend')) {
                Cookie::queue(Cookie::forget('enable-resend'));
            }

            if (Cookie::has('email-for-resend')) {
                Cookie::queue(Cookie::forget('email-for-resend'));
            }
        } catch (\Exception $e) {
            report($e);

            session()->flash('error', trans('shop::app.customers.signup-form.verification-not-sent'));

            return redirect()->back();
        }

        session()->flash('success', trans('shop::app.customers.signup-form.verification-sent'));

        return redirect()->back();
    }

    /**
     * Show the OTP verification form.
     *
     * @return RedirectResponse|View
     */
    public function showOtpForm()
    {
        $customerId = session('otp_customer_id');

        if (! $customerId) {
            return redirect()->route('shop.customers.register.index');
        }

        $customer = $this->customerRepository->find($customerId);

        if (! $customer) {
            return redirect()->route('shop.customers.register.index');
        }

        $maskedPhone = $this->maskPhone($customer->phone);

        return view('shop::customers.verify-otp', compact('maskedPhone'));
    }

    /**
     * Verify the OTP submitted by the customer.
     *
     * @return RedirectResponse
     */
    public function verifyOtp(Request $request)
    {
        $request->validate([
            'otp' => 'required|string|size:6',
        ]);

        $customerId = session('otp_customer_id');

        if (! $customerId) {
            return redirect()->route('shop.customers.register.index');
        }

        $customer = $this->customerRepository->find($customerId);

        if (! $customer) {
            return redirect()->route('shop.customers.register.index');
        }

        if (! $this->otpService->verify($customer->phone, $request->otp)) {
            session()->flash('error', 'Invalid or expired OTP. Please try again.');

            return redirect()->back();
        }

        $customer->update([
            'is_verified' => 1,
            'token' => null,
        ]);

        session()->forget('otp_customer_id');

        auth()->guard('customer')->login($customer);

        return redirect()->route('shop.customers.account.profile.index');
    }

    /**
     * Resend OTP to the customer's phone.
     *
     * @return RedirectResponse
     */
    public function resendOtp()
    {
        $customerId = session('otp_customer_id');

        if (! $customerId) {
            return redirect()->route('shop.customers.register.index');
        }

        $customer = $this->customerRepository->find($customerId);

        if (! $customer) {
            return redirect()->route('shop.customers.register.index');
        }

        if (! $this->otpService->canResend($customer->phone)) {
            session()->flash('warning', 'Please wait before requesting another OTP.');

            return redirect()->back();
        }

        $this->otpService->generateAndSend($customer->phone);

        session()->flash('success', 'A new OTP has been sent to your phone.');

        return redirect()->back();
    }

    /**
     * Mask a phone number for display.
     */
    private function maskPhone(string $phone): string
    {
        $length = strlen($phone);

        if ($length <= 4) {
            return $phone;
        }

        return substr($phone, 0, 4).str_repeat('*', $length - 7).substr($phone, -3);
    }
}
