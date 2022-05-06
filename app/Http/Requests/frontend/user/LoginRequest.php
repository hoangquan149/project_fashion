<?php

namespace App\Http\Requests\frontend\user;

use Illuminate\Foundation\Http\FormRequest;

class LoginRequest extends FormRequest
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
            'email'=>'required|email|exists:users',
            'password'=>'required'
        ];
    }

    public function messages(){
        return [
            "email.email" => "Email không đúng định dạng",
            "email.exists" => "Không có tài khoản này",
            "email.required" => "Email không được để trống",
            "password.required" => "Mật khẩu không được để trống",
            "password.confirmed" => "Mật khẩu không đúng"
        ];
    }

}
