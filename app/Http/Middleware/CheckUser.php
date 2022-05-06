<?php

namespace App\Http\Middleware;

use App\Models\Cart;
use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CheckUser
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next,$guard = 'customer')
    {
        if (!Auth::guard($guard)->check()) {
            return redirect()->route('frontend.login');
        } else {
            if (Auth::guard('customer')->user()->role == 'customer') {
                $cart = Cart::where('user_id',Auth::guard('customer')->user()->id)->count();
                if ($cart > 0){
                    return $next($request);
                }else{
                    return redirect()->route('frontend.list.cart');
                }
            } else {
                return redirect()->route('frontend.login');
            }
        }
    }
}
