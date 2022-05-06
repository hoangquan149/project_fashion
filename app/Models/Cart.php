<?php

namespace App\Models;

use App\Models\backend\Product;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cart extends Model
{
    use HasFactory;
    protected $table = 'carts';
    protected $fillable = ['user_id','product_id','color_id','size_id','quantity','status'];

    public function getProduct(){
        return $this->belongsTo(Product::class,'product_id','id');
    }
}
