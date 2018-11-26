<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UserStoreRequest extends FormRequest
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
            'name'        => 'required|max:191',
            'email'       => 'required|email|unique:users,email|max:191',
            'password'    => 'required|min:6|max:50',
            're_password' => 'same:password',
            'address'     => 'required|max:191',
            'phone'       => 'required|min:10|max:11',
            'role'        => 'required',
            'avatar'      => 'mimes:jpg,png,jpeg|nullable',
        ];
    }
}
