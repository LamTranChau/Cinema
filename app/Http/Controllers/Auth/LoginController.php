<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function templateLogin(){
        return view('admin.login.index');
    }


    public function login(Request $request){
        $data = [
            'email' => $request -> email,
            'password' => $request -> password
        ];
        // dd($data);
        if (Auth::attempt($data)) { 
            return redirect()->route('admin.user.index');
        } else {
            // return 'Sai';
            return redirect()->route('login')->with('success', 'Sai tài khoản hoặc mật khẩu.');
        }
    }

    public function logout(Request $request){
        
        Auth::logout();
    
        $request->session()->invalidate();
    
        $request->session()->regenerateToken();
    
        return redirect()->route('login');

    }


    
}
