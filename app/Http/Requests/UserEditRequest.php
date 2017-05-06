<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;

class UserEditRequest extends Request
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
            'username'   => 'required|regex:'.config('define.regex_username').'|max:50|min:3',
            'email'      => 'required|email|min:10|max:100',
            'address'    => 'required|regex:'.config('define.regex_address').'|max: 100|min:6',
            'mobile_phone'      => 'required|regex:/^[0-9]*$/i|max: 14|min:10',
            'avatar'     => 'mimes:jpeg,jpg,png|max:100',
        ];
    }
}
