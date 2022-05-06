<?php

namespace App\Http\Controllers\frontend;

use App\Http\Controllers\Controller;
use App\Models\Blog;
use Illuminate\Http\Request;

class BlogCusController extends Controller
{
    public function index(){
        return view('frontend.pages.blog.blog');
    }

    public function detail($id){
        $blog = Blog::find($id);
        return view('frontend.pages.blog.blogDetail',compact('blog'));
    }

}
