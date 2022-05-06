<?php

namespace App\Http\Requests\frontend\user;

use Illuminate\Foundation\Http\FormRequest;

class RegisterRequest extends FormRequest
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
            'name'=>'required|min:12',
            'email'=>'required|unique:users',
            'phone'=>'required',
            'password'=>'required|min:6',
            'confirmPassword'=>'required|same:password'
        ];
    }

    public function messages()
    {
        return [
            "name.required" => "Tên không được để trống",
            "email.required" => "Email không được để trống",
            "email.unique" => "Email đã tồn tại",
            "phone.required"=>"Số điện thoại không được để trống",
            "password.required" => "Mật khẩu không được để trống",
            "password.min" => "Mật khẩu phải lớn hơn hoặc bằng 6 kí tự",
            "confirmPassword.required" => "Xác nhận mật khẩu không được để trống",
            "confirmPassword.same" => "Không trùng khớp với mật khẩu"
        ];
    }
}
