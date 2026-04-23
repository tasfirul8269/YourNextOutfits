<?php

namespace Frooxi\Shop\Http\Requests\Customer;

use Frooxi\Core\Rules\PhoneNumber;
use Frooxi\Core\Rules\PostCode;
use Frooxi\Customer\Rules\VatIdRule;
use Illuminate\Foundation\Http\FormRequest;

class AddressRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'company_name' => ['nullable'],
            'first_name' => ['required'],
            'last_name' => ['required'],
            'address' => ['required', 'array', 'min:1'],
            'country' => core()->isCountryRequired() ? ['required'] : ['nullable'],
            'state' => core()->isStateRequired() ? ['required'] : ['nullable'],
            'city' => ['required', 'string'],
            'postcode' => core()->isPostCodeRequired() ? ['required', new PostCode] : [new PostCode],
            'phone' => ['required', new PhoneNumber],
            'vat_id' => [(new VatIdRule)->setCountry($this->input('country'))],
            'email' => ['required'],
        ];
    }

    /**
     * Attributes.
     *
     * @return array
     */
    public function attributes()
    {
        return [
            'address.*' => 'address',
        ];
    }
}
