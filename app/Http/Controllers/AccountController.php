<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
class AccountController extends Controller
{
    public function index(){
        return view("home.index");
    }
    public function login(){
        return view('account.login');
    }

    public function check_login(){
        request()->validate([
            'email' => 'required|email|exists:users',
            'password' => 'required'
        ]);
        $data = request()->all('email', 'password');
        if(auth()->attempt($data)){ 
            $user = auth()->user();
            // if($user->hasRole('admin'))
            //     return redirect()->route('admin.index');
            return redirect()->route('home.index');
        }
        return redirect()->back();
    }

    public function register(){
        return view('account.register');
    }
    public function check_register(){
        request()->validate([
            'name' => 'required',
            'email' => 'required|email|unique:users',
            'password' => 'required',
            'confirm_password' => 'required|same:password'
        ]);
        $data = request()->all('email', 'name');
        $data['password'] = bcrypt(request('password'));
        // dd ($data);

        User::create($data);
        
        return redirect()->route('account.login');
    }

    public function logout()
    {
        Auth::logout(); // Đăng xuất người dùng
        return redirect()->route('account.login'); // Chuyển hướng đến trang đăng nhập
    }
}
