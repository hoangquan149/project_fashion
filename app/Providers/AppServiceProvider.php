<?php

namespace App\Providers;

use App\Models\backend\Brand;
use App\Models\backend\Category;
use App\Models\backend\Product;
use App\Models\Blog;
use App\Models\Cart;
use App\Models\CategoryBlog;
use App\Models\Color;
use App\Models\Size;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        view()->share(
            [
                'categoryBlog' => CategoryBlog::all(),
                'category'=>Category::all(),
                'brand'=>Brand::all(),
                'color'=>Color::all(),
                'size'=>Size::all(),
                'blog'=>Blog::all()

            ]
        );
        view()->composer('*', function ($view)
        {
            $data =[];
            if (Auth::guard('customer')->user()){
                $data['cartCount']=  Cart::where('user_id', Auth::guard('customer')->user()->id)->count();
                $data['carts']=  Cart::where('user_id', Auth::guard('customer')->user()->id)->get();
            }
            $view->with($data);
        });

    }
}
