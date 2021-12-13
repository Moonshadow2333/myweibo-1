<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PasswordController extends Controller
{
    public function showLinkRequestForm(){
        return view('auth.password.email');
    }
    public function sendResetLinkEmail(Request $request){
        // 1. 验证邮箱
        $request->validate(['email'=>'required|email']);
        $email = $request->email;
        // 获取对应用户
        $user = User::where('email',$email)->first();
        // 如果不存在
        if(is_null($user)){
            session()->flash('danger','邮箱未注册');
        }
        // 4.生成Token，会在视图emails.reset_link里拼接链接。
        $token = hash_hmac('sha256',Str::random(40), comfig('app.key'));

        // 5.入库，使用updateOrInsert来保持Email唯一
        DB::table('password_resets')->updateOrInsert(['email'=>$email],[
            'email'=>$email,
            'token'=>hash::make($token),
            'created_at' => new Carbon,
        ]);
        // 6. 将 Token 连接发送给用户
        Mail::send('email.reset_link',compact('token'),function($message) use ($email){
            $message->to($email)->subject('忘记密码');
        });
        session()->flash('success','重置密码邮件方法成功，请查收');
        return redirect()->back();
    }
}
