<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use App\Http\Requests\backend\user\LoginRequest;
use App\Models\backend\Category;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Symfony\Component\Console\Input\Input;

class AdminController extends Controller
{

    public function index()
    {
        return view('backend.index');
    }


    public function login(){
        return view('backend.pages.login.login');
    }

    public function loginPost(LoginRequest $request){
        $email = $request->email;
        $password = $request->password;
        if (Auth::guard('admin')->attempt(['email'=>$email,'password'=>$password])){
            return redirect()->route('admin.home');
        }
    }

    public function logout(){
        Auth::guard('admin')->logout();
        return redirect()->route('admin.login');
    }

}
