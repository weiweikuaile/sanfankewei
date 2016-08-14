<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\Http\Requests;
use App\Http\Controllers\Controller;

class MembersController extends Controller
{
    //个人中心首页
    public function getIndex()
    {
        
    	$res = DB::select('select * from user where id = '.session('id'));

    	return view("home.member.index",['users' => $res]);
    }

    //个人中心收藏
    public function getCollection(Request $request)
    {
    	$id = $request->id;

        $res = DB::select('select * from user where id = :id', ['id' => $id]);

    	return view("home.member.collection",['users' => $res]);
    }

    //个人信息修改 
    public function getEdit(Request $request)
    {
    	$id = $request->id;

        $res = DB::select('select * from user where id = :id', ['id' => $id]);

        return view("home.member.edit",['users' => $res]);
    }

    //历史记录
    public function getHistory(Request $request)
    {
    	$id = $request->id;

        $res = DB::select('select * from user where id = :id', ['id' => $id]);

        return view("home.member.history",['users' => $res]);

    }

    //安全中心
    public function getSafe()
    {
    	return view("home.member.safe");
    }


    //个人信息修改 数据操作
    public function postUpdate(Request $request)
    {   
        $data = $request->only(["nickname",'email','phone','id']);
        //表单验证
            $this->validate($request,[
                'email' => 'required|email',
                'phone' => 'required|regex:/1[3-8]\d{9}/',
                ],[
                'email.required' => '邮箱不能为空',
                'email.email' => '邮箱格式不正确',
                'phone.required' => '手机号不能为空',
                'phone.regex' => '手机号格式不正确',
                ]);
            //随机token
            $data['token'] = str_random(50);
            //处理图像
            $data['pic'] = $this->upload($request);

            $res = DB::table('user')
                 ->where('id',$request->get('id'))
                 ->update($data);
            //判断
            if($res){
                return redirect('/members/index')->with("success",'添加成功');
            }else{
                return back()->with('error','数据添加失败');
            }

    }

    //收货地址
    public function getAddress(Request $request)
    {
        // dd($request->all());
        $uid = $request->input("id");

        $res = DB::select('select * from address where uid = :uid', ['uid' => $uid]);

        //解析模板
        return view("home.member.address",['users' => $res,'uid'=>$uid]);
    }



    //收货地址  添加
    public function postAddressupdate(Request $request)
    {

        // dd($request->input("id"));
        // dd($request->all());
        $data = $request->except(["_token"]);
        //执行插入
        $res = DB::table("address")->insert($data);

        //判断
        if($res){
            return redirect('/members/address?id=50')->with("success",'添加成功');
        }else{
            return back()->with('error','数据添加失败');
        }

        // return view("home.member.address");
    }

    //收货地址 删除
    public function getAjaxdelete(Request $request)
    {
            
        $id = $request->input('id');

        //执行删除
        $res = DB::table("address")->where('id',$id)->delete();
        //判断
        if($res){
            echo 1;
        }else{
            echo 0;
        }
    


    }
    //文件上传
    public function upload(Request $request)
    {
    //dd($request->all());
    //检测是否有上传文件
    if($request->hasFile('pic')){
        //文件名
        $name = md5(time()+rand(1,12345678));
        //获取文件后缀名
        $suffix=$request->file("pic")->getClientOriginalExtension();
        $arr = ["jpg","png"];
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

}
