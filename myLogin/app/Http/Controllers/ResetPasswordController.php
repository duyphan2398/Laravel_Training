<?php

namespace App\Http\Controllers;
use App\Mail\MailNotify;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Str;

class ResetPasswordController extends Controller
{
    public function getResetPassword(){
        return view('authentication.resetPassword');
    }

    public  function  postResetPassword(Request $request){
        $request->validate(
            [
           'email' => 'required|email'
            ], [
            'email.email' => 'KHÔNG PHẢI EMAIL'
            ]);
        $user = User::whereEmail($request->email)->first();
        if (!$user){
            return redirect()->back()->withErrors('EMAIL KHÔNG TỒN TẠI');
        }
        /* làm sao để UnHash mật khẩu và gửi cho user, mà không cần tạo mật khẩu mới */
        $newPassword = Str::random(3);
        $user->password = Hash::make($newPassword);
        if ($user->save())
        {
            $details = [
                "password" => $newPassword,
                "name" => $user->name
            ];
            Mail::to($user->email)->send(new MailNotify($details));
            session()->flash('status','MẬT KHẨU ĐÃ ĐƯỢC GỬI ĐẾN EMAIL');
            return redirect()->back();
        }
        return redirect()->back()->withErrors('KHÔNG THỂ CẬP NHẬT MẬT KHẨU');
    }
}
