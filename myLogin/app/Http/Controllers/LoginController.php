<?php

namespace App\Http\Controllers;

use Illuminate\Auth\Events\Login;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function index(){
        return view('authentication.login');
    }

    public function login(Request $request){
        $request->validate([
            'email' => 'required|email',
            'password' => 'required|max:5',
        ],[
            'email.email' => 'KHÔNG PHẢI EMAIL',
            'password.max' => 'PASSWORD DÀI TỐI ĐA 5 KÝ TỰ',
        ]);

        if ( Auth::attempt(['email' => $request->email, 'password' => $request->password])){
            $user = Auth::user();
            return redirect('/');
        }
        else {
            return redirect()->back()->withErrors(['THÔNG TIN ĐĂNG NHẬP KHÔNG ĐÚNG']);
        }

    }

    public function logout(){
        Auth::logout();
        return redirect('login');
    }
}
