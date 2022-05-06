<?php

namespace App\Http\Requests\backend\product;

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
            'name' => 'required|unique:products',
            'file' => 'required',
            'files' => 'required',
            'price' => 'required|integer|min:1',
            'sale_price' => 'integer|max:'.request()->price,
            'category_id' => 'required',
            'brand_id' => 'required',
            'description'=>'required',
            'sizes'=>'required',
            'colors'=>'required'
        ];
    }

    public function messages()
    {
        return [
            "name.required" => "Tên danh mục không được để trống",
            "name.unique" => "Tên danh mục $this->name đã tồn tại",
            "file.required" => "Ảnh sản phẩm không được để trống",
            "files.required" => "Ảnh chi tiết sản phẩm không được để trống",
            "price.required" => "Gía sản phẩm không được để trống",
            "price.integer" => "Gía sản phẩm phải là số",
            "price.min" => "Gía sản phẩm phải lớn hơn một",
            "sale_price.max" => "Gía sale không được lớn hơn giá",
            "sale_price.integer" => "Gía sale sản phẩm phải là số",
            "category_id.required" => "Danh mục sản phẩm không được để trống",
            "brand_id.required" => "Nhãn hàng sản phẩm không được để trống",
            "description.required"=>"Mô tả sản phẩm không được rỗng",
            "sizes.required" => "Size sản phẩm phải có",
            "colors.required"=>"Màu sản phẩm phải có"
        ];
    }
}
