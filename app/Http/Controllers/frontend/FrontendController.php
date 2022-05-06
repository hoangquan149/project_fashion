<?php

namespace App\Http\Controllers\frontend;

use App\Http\Controllers\Controller;
use App\Http\Requests\frontend\user\LoginRequest;
use App\Http\Requests\frontend\user\RegisterRequest;
use App\Models\backend\Product;
use App\Models\Banner;
use App\Models\Blog;
use App\Models\Cart;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class FrontendController extends Controller
{
    public function index(){
        $data = [
            'product'=> Product::where('status',1)->limit(8)->get(),
            'banner'=> Banner::where('status',1)->get(),
            'blog' => Blog::where('status',1)->get()
        ];
        return view('frontend.index',compact('data'));
    }

    public function detailProduct($id){
        $products = Product::find($id);
        $relateProduct = Product::where('category_id',$products->category_id)->where('id','<>',$products->id)->get();
        return view('frontend.pages.detailProduct',compact('products','relateProduct'));
    }

    public function getProByAll(Request $request,Product $pro){
        $product = $pro->getAllPro($request);
        return view('frontend.pages.shop.shop',compact('product'));
    }

    public function shop(){
//        if (isset($_GET['sort_by'])){
//            $sortBy = $_GET['sort_by'];
//            $data = explode('_',$sortBy);
//            $product = Product::orderBy($data[0],$data[1])->paginate(8);
//        }else{
            $product = Product::paginate(8);
//        }
        return view('frontend.pages.shop.shop',compact('product'));
    }

    public function login(Request $request){
        return view('frontend.pages.user.login');
    }

    public function register(){
        return view('frontend.pages.user.register');
    }

    public function logout(){
        Auth::guard('customer')->logout();
        return redirect()->route('frontend.home');
    }

    public function loginPost(LoginRequest $request){
        $email = $request->email;
        $password = $request->password;
        if (Auth::guard('customer')->attempt(['email'=>$email,'password'=>$password])){
            if ($request['cart']){
                return redirect()->route('frontend.list.cart');
            }else if ($request['add'] && $request['proName'] && $request['id']){
                $id = $request['id'];
                return redirect()->route('frontend.detail.product',$id);
            }else{
                return redirect()->route('frontend.home');
            }
        }

    }

    public function registerPost(RegisterRequest $request){
        User::create([
            'name'=>$request->name,
            'email'=>$request->email,
            'phone'=>$request->phone,
            'password'=>bcrypt($request->password)
        ]);
        return redirect()->route('frontend.home')->with('success','Đăng ký thành công');
    }


}
