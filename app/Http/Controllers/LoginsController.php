<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Hash;
use DB;
use App\Http\Requests;
use App\Http\Controllers\Controller;

class LoginsController extends Controller
{
	/*
    *   后台登录页
    */
    public function getIndex()
    {
        return view('admin.login');
    }

    /*
    *   执行登录验证操作
    */
    public function postDologin(Request $request)
    {
        // dd($request->input('username'));
        $user = DB::table('user')
            ->where('email',$request->input('email'))
            ->first();
        if(!empty($user)){
            //检测密码是否一致
            if(Hash::check($request->input('password'),$user->password)){
                //登录成功
                session(['id'=>$user->id,'email'=>$user->username]);
                //跳转页面
                return redirect('/admin')->with('success','欢迎'.$user->username);
            }else{
                return back()->with('error','用户名或密码错误');
            }
        }else{
            return back()->with('error','用户名或密码错误');
        }
    }

    /*
    *   用户注销
    */
    public function getOut()
    {
        session(['id'=>'']);
        return back();
    }


}
