<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RegistrationFormRequest extends FormRequest
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
    public function rules() {
        return [
            'name' => 'required|string',
            'email' => 'required|email|unique:users',
            'password' => 'required|string|min:8',
            'confirmPassword' => 'required|same:password'
        ];
    }

    public function messages() {
        return [
            'name.required' => 'Fill in your username, please',
            'email.required'  => 'Fill in your email, please',
            'password.required'  => 'Fill in your password, please',
            'confirmPassword.required'  => 'Fill in your password confirmation, please',

            'email.unique:users'  => 'User with this email already exist',

            'confirmPassword.same:password'  => 'Passwords does not match',


        ];
    }
}
