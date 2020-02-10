<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class RegisterController extends Controller
{
    public function index(){
        return view('authentication.register');
    }

    public function register(Request $request){
        $request->validate([
            'name' => 'required|max:255',
            'email' => 'required|unique:users|email',
            'password' => 'required|max:5',
            'passwordConfirm' => 'required|same:password'
        ], [
            'email.unique' => 'EMAIL ĐÃ TỒN TẠI',
            'email.email' => 'KHÔNG PHẢI EMAIL',
            'password.max' => 'PASSWORD DÀI TỐI ĐA 5 KÝ TỰ',
            'passwordConfirm.same' => 'PASSWORD CONFIRM KHÔNG GIỐNG PASSOWORD'
            ]);

        $user = User::create($request->all());
        $user->password = Hash::make($user->password);
        if ($user->save()) {
            session()->flash('status', 'TÀI KHOẢN TẠO THÀNH CÔNG');
            return redirect('/login');
        }
        else {
            return  redirect()->back()->withErrors(['status' => 'KHÔNG THỂ TẠO']);
        }
    }
}
