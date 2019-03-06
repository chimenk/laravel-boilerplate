<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Hash;

class StoreProfile extends FormRequest
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
            'name' => 'required',
            'email' => 'required',
            'password' => 'nullable|required_with:confirm_password|string|confirmed',
            'current_password' => 'nullable'
        ];
    }

    /**
     * Configure the validator instance.
     *
     * @param  \Illuminate\Validation\Validator  $validator
     * @return void
     */
    public function withValidator($validator)
    {
        $validator->after(function($validator) {
            if(!empty($this->current_password)){
                if(!Hash::check($this->current_password, $this->user()->password)){
                    $validator->errors()->add('current_password', 'Your current password is incorrect');
                }
            }
        });
        return;
    }
}
