<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UserUpdateRequest extends FormRequest
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
            'name' => 'required|max:191',
            'password' => 'nullable|min:6|max:191',
            're_password' => 'same:password',
            'address' => 'required|max:191',
            'phone' => 'required|digits_between:9,11',
            'avatar' => 'mimes:jpeg,png,jpg|nullable',
        ];
    }
}
