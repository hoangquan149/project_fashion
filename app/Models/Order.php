<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;

class Order extends Model
{
    use HasFactory;
    protected $table = 'orders';
    protected $fillable = ['user_id','address','note','total','status'];

    public function getUser(){
        return $this->belongsTo(User::class,'user_id','id');
    }
    public function postOrder($request){
        $orderPost = Order::create([
            'user_id'=>Auth::guard('customer')->user()->id,
            'address'=>$request->address,
            'note'=>$request->note,
            'total'=>$request->total
        ]);
        return $orderPost;
    }
}
