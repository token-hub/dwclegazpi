<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CreateUserFormRequest extends FormRequest
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
            'firstname' => 'required',
            'lastname' => 'required',
            'username' => 'required|max:15|min:8|unique:users,username',
            'password' => 'required|max:20|min:8|regex:/^.*(?=.*[a-zA-Z])(?=.*[0-9]).*$/|',
            'gender' => 'required',
            'department_name' => 'required',
            'email' => 'required|email|unique:users,email',
            'user_access' => 'required'
        ];
    }

    public function messages() {
      return [
            'password.regex' => 'Your password should be alphanumeric'
        ];
    }
}
