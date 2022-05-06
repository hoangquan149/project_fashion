<?php

namespace App\Http\Requests\backend\category;

use Illuminate\Foundation\Http\FormRequest;

class AddRequest extends FormRequest
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
            'name'=>'required|unique:categories'
        ];
    }

    public function messages()
    {
        return [
            'name.required'=>'Tên danh mục không được trống',
            'name.unique'=>'Tên danh mục này đã tồn tại'
        ];
    }
}
