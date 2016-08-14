<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\Http\Requests;
use App\Http\Controllers\Controller;

class OrdersController extends Controller
{
    /*  
     *订单列表页
    */
    public function getIndex(Request $request)
    {
        $keywords = $request->keywords;
        $num = $request->input('num','10');
        $status = $request->input('status',1);
        $res = DB::table('order')
            ->where('status',$status)
            ->where('ordernum','like','%'.$keywords.'%')
            ->paginate($num);
        //解析模板 分配变量
        return view('admin.order.index',['order'=>$res,'request'=>$request]);
     
    }

    /*
     *订单详情页
    */
    public function getInfo(Request $request)
    {
        $id = $request->input('id');
        // dd($id);
        //查询订单信息
        $order = DB::table('order')->where('id',$id)->first();
        //查询用户地址
        $address = DB::table('address')->where('id',$order->address)->first();
        //查询用户名
        $userinfo = DB::table('user')->where('id',$order->uid)->first();
        //查询订单内商品信息
        $goods = DB::table('order_goods')->where('oid',$order->id)->get();
        foreach($goods as $k => $v){
            $res = DB::table('goods')->where('id',$v->gid)->first();
            $res->num = $v->num;
            $goodsinfo[] = $res;
        }
        //解析模板 分配变量
        return view('admin.order.info',['order'=>$order,'username'=>$userinfo->username,'goodsinfo'=>$goodsinfo,'address'=>$address]);
    }

    /*
     *删除订单操作
    */
    public function getDelete(Request $request)
    {
        $id = $request->input('id');

        $res = DB::table('order_goods')->where('oid',$id)->delete();
        if($res){
            $res1 = DB::table('order')->where('id',$id)->delete();
            if($res1){
                return redirect('/admin/orders')->with("success",'删除成功');
            }else{
                return redirect('/admin/orders')->with("success",'删除失败');
            }
        }else{
            return back()->with('error','删除失败');
        }
    }

    public function getAdd()
    {
        return view('admin.order.add');
    }


}
