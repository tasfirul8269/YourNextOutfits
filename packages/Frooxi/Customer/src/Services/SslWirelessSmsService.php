<?php

namespace Frooxi\Customer\Services;

use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log;

class SslWirelessSmsService implements SmsService
{
    public function sendOtp(string $phone, string $otp): bool
    {
        $message = "Your verification code is: {$otp}. It expires in 5 minutes.";

        if (config('sslwireless.mock')) {
            Log::info("Mock SMS OTP to {$phone}: {$otp}");

            return true;
        }

        try {
            $response = Http::post(config('sslwireless.url'), [
                'api_token' => config('sslwireless.api_token'),
                'sid' => config('sslwireless.sid'),
                'msisdn' => $phone,
                'sms' => $message,
                'csms_id' => uniqid('otp_'),
            ]);

            if ($response->successful()) {
                Log::info("SSL Wireless SMS sent to {$phone}");

                return true;
            }

            Log::error('SSL Wireless SMS failed', [
                'phone' => $phone,
                'response' => $response->body(),
            ]);

            return false;
        } catch (\Exception $e) {
            Log::error('SSL Wireless SMS exception', [
                'phone' => $phone,
                'message' => $e->getMessage(),
            ]);

            return false;
        }
    }
}
