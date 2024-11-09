<?php

namespace App\Http\Requests;

use App\Enums\CustomerStatus;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rules\Enum;

class CustomerRequest extends FormRequest
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
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'first_name' => ['required'],
            'last_name' => ['required'],
            'phone' => ['required', 'min:7'],
            'email' => ['required', 'email'],
            'status' => ['required', 'boolean'],

            'billing.address1' => ['required'],
            'billing.province' => ['required'], 
            'billing.district' => ['required'], 


        ];
    }

    public function attributes()
    {
        return [
            'billingAddress.address1' => 'address 1',
            'billingAddress.province' => 'province', 
            'billingAddress.district' => 'district', 
           
          
        ];
    }
}