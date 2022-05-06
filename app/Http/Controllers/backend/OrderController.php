<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use App\Models\Cart;
use App\Models\Order;
use App\Models\OrderDetail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class OrderController extends Controller
{
    public function index(){
        if (isset($_GET['status'])) {
            $sortBy = $_GET['status'];
            $order = Order::where('status', $sortBy)->get();
        }else{
            $order = Order::orderBy('created_at','DESC')->get();
        }
        return view('backend.pages.order.index',compact('order'));
    }

    public function edit($id){
        $order = Order::find($id);
        $orderDetail = OrderDetail::where('order_id',$order->id)->get();
        return view('backend.pages.order.detail',compact('order','orderDetail'));
    }

    public function update(Request $request,$id){
        Order::where('id',$id)->update($request->all());
        return response()->json([
            'messenger'=>"Update trạng thái thành công",
            'status'=>200
        ]);
    }

    public function destroy($id){
        Order::destroy($id);
        return response()->json([
            'messenger'=>"Xóa đơn hàng thành công",
            'status'=>200
        ]);
    }
}
