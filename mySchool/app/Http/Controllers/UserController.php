<?php

namespace App\Http\Controllers;

use Faker\Provider\File;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use  Illuminate\Support\Facades\Storage;
class UserController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function createAvatar(){
        return view('user.userForm');
    }
    public function storeAvatar(Request $request){
        $user = Auth::user();
        if ( $file = $request->file('avatar')) {
            if (file_exists($user->avatar) && $user->avatar != 'images/default.png')
            {
                Storage::delete($user->avatar);
            }
            $destinationPath = 'images/';
            $profileImage = 'images/'.date('YmdHis') . "." . $file->getClientOriginalExtension();
            $file->move($destinationPath, $profileImage);
            $user->avatar = $profileImage;
        }

        if ($user->save()) {
            $request->session()->flash('status', 'Updated !');
            return redirect('/subjects');
        }
        return redirect()->back();

    }
}
