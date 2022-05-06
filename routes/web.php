<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Backend\AdminController;
use App\Http\Controllers\Backend\CategoryController;
use App\Http\Controllers\Backend\BrandController;
use App\Http\Controllers\Backend\ProductController;
use App\Http\Controllers\Backend\BannerController;
use App\Http\Controllers\Backend\UserController;
use App\Http\Controllers\Backend\OrderController;
use App\Http\Controllers\Backend\BlogController;
use App\Http\Controllers\Backend\CategoryBlogController;
use App\Http\Controllers\Backend\ColorController;
use App\Http\Controllers\Backend\SizeController;
use App\Http\Controllers\Frontend\FrontendController;
use App\Http\Controllers\Frontend\BlogCusController;
use App\Http\Controllers\Frontend\CommentController;

use App\Http\Controllers\Frontend\CartController;

Route::prefix('admin')->middleware('checkAdmin')->group(function (){
    Route::get('/',[AdminController::class,'index'])->name('admin.home');

    Route::get('/user',[UserController::class,'index'])->name('user.index');
    Route::prefix('')->group(function (){
        Route::resource('category',CategoryController::class)->except('show');
    });

    Route::prefix('')->group(function (){
        Route::resource('blog',BlogController::class)->except('show');
    });

    Route::prefix('')->group(function (){
        Route::resource('blog-category',CategoryBlogController::class)->except('show');
    });

    Route::prefix('')->group(function (){
        Route::resource('banner',BannerController::class)->except('show');
    });

    Route::prefix('')->group(function (){
        Route::resource('brand',BrandController::class)->except('show');
    });

    Route::prefix('')->group(function (){
        Route::resource('color',ColorController::class)->except('show');
    });

    Route::prefix('')->group(function (){
        Route::resource('size',SizeController::class)->except('show');
    });

    Route::prefix('')->group(function (){
        Route::resource('order',OrderController::class)->except('show','update');
        Route::get('update-order/{id}',[OrderController::class,'update'])->name('order.update');
    });

    Route::resource('product',ProductController::class)->except('show');
});

Route::get('admin/login/',[AdminController::class,'login'])->name('admin.login');
Route::post('admin/login/',[AdminController::class,'loginPost'])->name('admin.post.login');
Route::get('admin/logout',[AdminController::class,'logout'])->name('admin.logout');
Route::prefix('/')->group(function (){
    Route::get('',[FrontendController::class,'index'])->name('frontend.home');
    Route::get('detail/san-pham/id={id}',[FrontendController::class,'detailProduct'])->name('frontend.detail.product');
    Route::get('shop',[FrontendController::class,'shop'])->name('frontend.shop');
    Route::get('blog',[BlogCusController::class,'index'])->name('frontend.blog');
    Route::get('blog-detail/{id}',[BlogCusController::class,'detail'])->name('frontend.detail.blog');
    Route::get('shop/{id}',[FrontendController::class,'getProByAll'])->name('frontend.all.product');
    Route::get('cart',[CartController::class,'index'])->name('frontend.list.cart');
    Route::get('getCart',[CartController::class,'getCart'])->name('frontend.get.cart');
    Route::get('postcart',[CartController::class,'store'])->name('frontend.post.cart');
    Route::get('update-cart',[CartController::class,'update'])->name('frontend.update.cart');
    Route::get('delete-cart/{id}',[CartController::class,'destroy'])->name('frontend.delete.cart');
   Route::middleware('checkUser')->group(function (){
       Route::get('checkout',[CartController::class,'checkout'])->name('frontend.checkout');
       Route::post('checkout-post',[CartController::class,'checkoutPost'])->name('frontend.post.checkout');
   });
    Route::prefix('')->group(function (){
        Route::get('login',[FrontendController::class,'login'])->name('frontend.login');
        Route::get('logout',[FrontendController::class,'logout'])->name('frontend.logout');
        Route::get('register',[FrontendController::class,'register'])->name('frontend.register');
        Route::post('login',[FrontendController::class,'loginPost'])->name('frontend.post.login');
        Route::post('register',[FrontendController::class,'registerPost'])->name('frontend.post.register');
    });
    Route::get('blog',[BlogCusController::class,'index'])->name('frontend.blog');
    Route::resource('comment',CommentController::class)->except('show');

});
