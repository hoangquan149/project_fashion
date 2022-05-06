<?php

namespace App\Models\backend;

use App\Models\Color;
use App\Models\ColorProduct;
use App\Models\Size;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Product extends Model
{
    use HasFactory;
    protected $table = 'products';
    protected $fillable = ['name','price','sale_price','image','category_id','brand_id','description','status','isHot'];

    public function getImageProduct()
    {
        return $this->hasMany(ImageProduct::class);
    }

    public function category(){
        return $this->belongsTo(Category::class);
    }

    public function colorProduct(){
        return $this->belongsToMany(Color::class,'color_products','product_id','color_id');
    }

    public function sizeProduct(){
        return $this->belongsToMany(Size::class,'size_products','product_id','size_id');
    }

    public function imageProduct(){
        return $this->hasMany(ImageProduct::class,'product_id','id');
    }


    public function getAllPro($request){
        $data = [
            'category'=>$request->get('category'),
            'brand' => $request->get('brand'),
            'color'=>$request->get('color'),
            'size'=>$request->get('size')
        ];
        if ($request->get('category')){
            $product = DB::table('categories')
                ->join('products','categories.id','=','products.category_id')
                ->where('categories.name',$data['category'])->paginate(8);
        }else if ($request->get('brand')){
            $product = DB::table('brands')
                ->join('products','brands.id','=','products.brand_id')
                ->where('brands.name',$data['brand'])->paginate(8);
        }else if ($request->get('color')){
            $product = DB::table('colors')
                ->join('color_products','colors.id','=','color_products.color_id')
                ->join('products','products.id','=','color_products.product_id')
                ->where('colors.name',$data['color'])->paginate(8);
        }else if ($request->get('size')){
            $product = DB::table('sizes')
                ->join('size_products','sizes.id','=','size_products.size_id')
                ->join('products','products.id','=','size_products.product_id')
                ->where('sizes.name',$data['size'])->paginate(8);
        }

        return $product;
    }
}
