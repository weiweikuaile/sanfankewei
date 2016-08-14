<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Hash;
use DB;
use App\Http\Requests;
use App\Http\Controllers\Controller;

class UsersController extends Controller
{
	//后台首页
    public function getIndex(Request $request)
    {
        //分页大小
        $num = $request->input('num',5);
        //关键字
        $keywords = $request->keywords;
        //使用分页  查询数据库
        if($request->input('keywords')){
            $users = DB::table('user')->where('username','like','%'.$request->input("keywords").'%')->paginate($num);
        }else{
            $users = DB::table('user')->paginate($num);
        }
        //解析模板分配变量
    	return view('admin.user.index',['users'=>$users,'request'=>$request]);
    }

    //后台用户添加
	public function getAdd()
	{
		//解析模板
		return view("admin.user.add");
	}

	//用户添加表单数据处理
    public function postInsert(Request $request)
    {
        //提取数据
		$data = $request->only(["username",'password','email','phone']);

        //表单验证 
            $this->validate($request,[
            'username' => 'required|regex:/\w{6,18}/',
            'password' => 'required|regex:/\w{6,18}/',
            'repassword' => 'required|same:password',
            'email' => 'required|email',
            'phone' => 'required|regex:/1[3-8]\d{9}/',
            ],[
            'username.required' => '用户名不能为空',
            'username.regex' => '用户名需要6到18位字母数字下划线',
            'password.required' => '密码不能为空',
            'password.regex' => '密码需要6到18位字母数字下划线',
            'repassword.required' => '确认密码不能为空',
            'repassword.same' => '两次密码不一致',
            'email.required' => '邮箱不能为空',
            'email.email' => '邮箱格式不正确',
            'phone.required' => '手机号不能为空',
            'phone.regex' => '手机号格式不正确',
            ]);
		//随机生成token
		$data['token'] = str_random(50);
		//用户状态
		$data['status'] = 1;
		//密码加密
		$data['password'] = Hash::make($data['password']);
    	//处理图像
    	$data['pic'] = $this->upload($request);
    	//数据入库
    	$res = DB::table('user')->insert($data);
    	//判断
    	if($res){
    		return redirect('/admin/users/index')->with("success",'添加成功');
    	}else{
    		return back()->with('error','数据添加失败');
    	}
    }

    //图片上传
    public function upload(Request $request){
    	//检测是否有上传文件
    	if($request->hasFile('pic')){
    		//文件名
    		$name = md5(time()+rand(1,12345678));
    		//获取文件后缀名
    		$suffix=$request->file("pic")->getClientOriginalExtension();
    		$arr = ["jpg","png","gif"];
    		//判断文件上传类型
    		if(!in_array($suffix,$arr)){
    			echo "上传文件不符合要求".die;
    		}
    		//将文件移动到指定位置
    		$request->file("pic")->move("./imgs",$name.".".$suffix);
    		//将文件路径及文件名称返回
    		return '/imgs/'.$name.'.'.$suffix;
    	}
    }

    //后台用户修改
	public function getEdit($id)
	{
        //获取用户信息
        $res = DB::table('user')->where('id',$id)->first();
        //解析模板 分配变量
        return view("admin.user.edit",compact("res"));
    }

    //后台用户修改数据操作
    public function postUpdate(Request $request)
    {  
        //提取数据
        $date = $request->except("uid","_token");
        //数据库查询
        $res = DB::table('user')
             ->where('id',$request->get('uid'))
             ->update($date);
        //判断
        if($res ==1){
            return redirect('/admin/users/index')->with("success",'修改成功');
        }else{
            return back()->with('error','修改失败');
        }
    }

    //ajax删除用户
    public function postAjaxdelete(Request $request)
    {
        $id = $request->input('id');
        //执行删除
        $res = DB::table("user")->where('id',$id)->delete();
        //判断
        if($res){
            echo 1;
        }else{
            echo 0;
        }
    }
}
