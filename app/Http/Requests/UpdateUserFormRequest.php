<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use App\Rules\old_password_checker;

class UpdateUserFormRequest extends FormRequest
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
            'firstname' => 'required|max:30',
            'lastname' => 'required|max:30',
            'username' => 'required|max:15|unique:users,username,'.$this->id.',id',
            'old_password' => ['nullable', 'max:20', 'min:8', new old_password_checker],
            'new_password' => 'nullable|max:20|min:8|regex:/^.*(?=.*[a-zA-Z])(?=.*[0-9]).*$/|',
            'gender' => 'required',
            'department_name' => 'required',
        ];
    }

    public function messages()
    {
        return [
            'name.required' => 'This field is required :D'
        ];
    }
}
