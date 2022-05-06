<?php

namespace App\Models;

use App\Models\backend\Product;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Color extends Model
{
    use HasFactory;
    protected $table = 'colors';
    protected $fillable = ['name','value','status'];


    public function productColor(){
        return $this->belongsToMany(Product::class,'color_products','product_id','color_id');
    }
}
