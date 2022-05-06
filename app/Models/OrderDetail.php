<?php

namespace App\Models;

use App\Models\backend\Product;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;

class OrderDetail extends Model
{
    use HasFactory;
    protected $table = 'order_details';
    protected $fillable = ['order_id','product_id','color_id','size_id','price','quantity','status'];

    public function product(){
        return $this->belongsTo(Product::class,'product_id');
    }

    public function Color(){
        return $this->belongsTo(Color::class);
    }

    public function Size(){
        return $this->belongsTo(Size::class);
    }

    public function postOrderDetail($request){
        if (Auth::guard('customer')->user()){
            $cart = Cart::where('user_id',Auth::guard('customer')->user()->id)->get();
            foreach ($cart as $value){
                $orderDetail = OrderDetail::create([
                    'order_id'=>$request->id,
                    'product_id'=>$value->product_id,
                    'color_id'=>$value->color_id,
                    'size_id'=>$value->size_id,
                    'price'=>$value->getProduct->sale_price > 0 ? $value->getProduct->sale_price : $value->getProduct->price,
                    'quantity'=>$value->quantity
                ]);
            }
        }
        return $orderDetail;
    }


}
