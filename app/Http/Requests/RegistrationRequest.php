<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RegistrationRequest extends FormRequest
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
            'firstName'=>'required|max:32',
            'lastName'=>'required|max:32',
            'email'=>'required|email|max:32|unique:users,email',
            'password'=>'required|max:32',
            'conpassword'=>'required|max:32',
        ];
    }
}
