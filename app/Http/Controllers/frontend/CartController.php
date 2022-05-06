<?php

namespace App\Http\Controllers\frontend;

use App\Http\Controllers\Controller;
use App\Models\backend\Product;
use App\Models\Cart;
use App\Models\Order;
use App\Models\OrderDetail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use function GuzzleHttp\Promise\all;

class CartController extends Controller
{
    public function totalQuantity($cart){
        $result = 0;
        foreach ($cart as $value){
            $result += $value->getProduct->sale_price > 0 ? $value->getProduct->sale_price * $value->quantity : $value->getProduct->price * $value->quantity;
        }
        return $result;
    }

    public function getCart(){
        $cart = Cart::where('user_id',Auth::guard('customer')->user()->id)->count();
        return response()->json(['cart'=>$cart]);
    }

    public function index(Request $request){
        if ($request['login'] == "cart"){
            $cart = $request['login'];
            return view('frontend.pages.user.login',['cart'=>$cart]);
        }else{
            if (Auth::guard('customer')->user()){
                $cart = Cart::where('user_id',Auth::guard('customer')->user()->id)->get();
                $result = $this->totalQuantity($cart);
            }else{
                $cart = [];
                $result = 0;
            }
            return view('frontend.pages.cart.listcart',compact('cart','result'));
        }
    }

    public function store(Request $request){
        if ($request['login']=="add-cart" && $request['sanpham'] && $request['id']){
            $add = $request->get('login');
            $proName = $request->get('sanpham');
            $id =  $request->get('id');
            return view('frontend.pages.user.login',[
                'add'=>$add,
                'proName'=>$proName,
                'id'=>$id
            ]);
        }else{
            $check = Cart::where('user_id',$request->user_id)
                ->where('product_id',$request->product_id)
                ->where('color_id',$request->color_id)
                ->where('size_id',$request->size_id)
                ->count();
            if ($check == 0){
                $cart = Cart::create($request->all());
            }else{
                $cart = Cart::where('user_id',$request->user_id)
                    ->where('product_id',$request->product_id)
                    ->where('color_id',$request->color_id)
                    ->where('size_id',$request->size_id)
                    ->first();
                $quantity = $request->quantity += $cart->quantity;
                Cart::where('id',$cart->id)->update([
                    'quantity'=>$quantity
                ]);
            }
            return response()->json(['messenger'=>'Đã thêm sản phẩm vào giỏ hàng','cart'=>$cart]);
        }
    }

    public function destroy($id){
        Cart::destroy($id);
        $countCart = Cart::where('user_id',Auth::guard('customer')->user()->id)->count();
        return response()->json(['messenger'=>'Xóa thành công','countCart'=>$countCart]);
    }

    public function update(Request $request){
        $cart = Cart::where('user_id',Auth::guard('customer')->user()->id)->get();
        foreach ($request->key as $key1 => $value1){
                foreach ($cart as $key2 => $value2){
                if ($key2 == $request['key'][$key1]){
                    $cartUpdate = $cart->find($request['id'][$key1]);
                    $cartUpdate->color_id = $request['color_id'][$key1];
                    $cartUpdate->size_id = $request['size_id'][$key1];
                    $cartUpdate->quantity = $request['quantity'][$key1];
                    $cartUpdate->save();
                }
            }
        }
        return response()->json(['messenger'=>'Update thành công']);
    }

    public function checkout(){
        if (Auth::guard('customer')->user()){
            $cart = Cart::where('user_id',Auth::guard('customer')->user()->id)->get();
            $total = $this->totalQuantity($cart);
        }else{
            $cart = [];
            $total = 0;
        }
        return view('frontend.pages.checkout',compact('cart','total'));
    }

    public function checkoutPost(Request $request,Order $order,OrderDetail $orderDetail){
        $orders = $order->postOrder($request);
        if ($orders){
            $orderDetail->postOrderDetail($orders);
            $cart = Cart::where('user_id',Auth::guard('customer')->user()->id)->get();
            if(Auth::guard('customer')->user()){
                foreach ($cart as $value){
                    Cart::where('user_id',Auth::guard('customer')->user()->id)->delete();
                }
            }
        }
        return response()->json(['messenger'=>'Đặt hàng thành công']);
    }
}
