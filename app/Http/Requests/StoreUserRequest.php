<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreUserRequest extends FormRequest
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
            'email' => 'required|email|max:255|unique:users',
            'mobile_number' => 'required|regex:/^(0)(9)([0-9]{8})$/',
            'password' => 'required|min:8',
            'confirm_password' => 'required|same:password',
        ];
    }
}