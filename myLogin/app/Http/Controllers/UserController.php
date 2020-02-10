<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class UserController extends Controller
{
    public function getUploadAvatar(){
        return view('user.uploadAvatar');
    }

    public function postUploadAvatar(Request $request)
    {
        $request->validate([
            'avatar' => 'required|mimes:jpeg,png,jpg'
        ]);
        if (Auth::user()->avatar != 'images/default.png' && Auth::user()->avatar != "" ){
            Storage::delete(Auth::user()->avatar);
        }
        $destinationPath = 'images/';
        $profileImage = 'images/'.date('YmdHis') . "." . $request->avatar->getClientOriginalExtension();
        $request->avatar->move($destinationPath, $profileImage);
        Auth::user()->avatar = $profileImage;
        if (Auth::user()->save()){
            session()->flash('status', 'CẬP NHẬT THÀNH CÔNG AVATAR');
            return redirect('/');
        }
        else {
            return redirect()->back()->withErrors([
                'status' => 'KHÔNG THỂ CẬP NHẬT AVATAR'
            ]);
        }


    }


}
