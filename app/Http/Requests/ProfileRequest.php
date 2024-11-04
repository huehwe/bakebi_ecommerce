<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProfileRequest extends FormRequest
{
    public function rules()
    {
        return [
            'first_name' => ['required'],
            'last_name' => ['required'],
            'phone' => ['required', 'min:7'],
            'email' => ['required', 'email'],

            'billing.address1' => ['required'],
            'billing.province' => ['required'], 
            'billing.district' => ['required'], 
        ];
    }

    public function attributes()
    {
        return [
            'billing.address1' => 'address 1',
            'billing.province' => 'province', 
            'billing.district' => 'district', 
        ];
    }
}