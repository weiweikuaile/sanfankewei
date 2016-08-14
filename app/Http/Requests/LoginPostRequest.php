<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;

class LoginPostRequest extends Request
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
            //
            'email'=>'required|email',
            'password'=>'required|regex:/^\w{6,18}$/',
        ];
    }

    public function messages()
    {
        return[
            'email.required' => '邮箱必须填写',
            'email.email' => '邮箱格式不正确',
            'password.required'=>'密码必须填写',
            'password.regex' => '密码需要6-18位字母数字下划线',
        ];
    }
}
