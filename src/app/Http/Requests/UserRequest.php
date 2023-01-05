<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UserRequest extends FormRequest
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
            'name'      => 'required | string | max:50',
            'email'     => 'required | email | unique:users',
            'password'  => 'required | min:8',
            'is_admin'  =>  'nullable | boolean',
        ];
    }

    public function messages()
    {
        return[
            'name.require'      => 'Name is required',
            'name.max'          => 'Name must have at least 50 characters',
            'email.require'     => 'E-mail is required',
            'email.email'       => 'Please inform a valid e-mail',
            'email.unique'      => 'E-mail already being used, please inform another.',
            'password.min'      => 'Password must have at least 8 characters',
            'password.require'  => 'Password is required',
        ];
    }
}
