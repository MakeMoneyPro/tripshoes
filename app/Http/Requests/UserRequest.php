<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;

class UserRequest extends Request
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
            'username'   => 'required|regex:/^[A-Za-z \t]*\p{L}+/i|max:50|min:3',
            'email'      => 'required|email|min:10|max:100',
            'password'   => 'required|min:6|max:100',
            'first_name'   => 'regex:/^[A-Za-z \t]*\p{L}+/i|max:100|min:3',
            'address'    => 'regex:/^[.,\-\/A-Za-z0-9 \t]*\p{L}+/i|max: 100|min:6',
            'phone'      => 'regex:/^[0-9]*$/i|max: 14|min:10',
            'image'      => 'mimes:jpeg,jpg,png|max:100',
        ];
    }
}
