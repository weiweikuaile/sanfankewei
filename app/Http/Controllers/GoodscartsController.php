<?php

namespace App\Http\Controllers;
use App\Models\Goods;
use Illuminate\Http\Request;
use DB;
use App\Http\Requests\GoodsPostRequest;
use App\Http\Requests;
use App\Http\Controllers\Controller;

class GoodscartsController extends Controller
{
    /*
    * 购物车页面
    */
    public function getIndex()
    {   
        //查询用户的购物车信息
        $res = DB::table('cart')->where('uid',session('id'))->get();
        if($res){
            $info = self::cartinfo($res);
            return view('home.cart',['info'=>$info]);
        }else{
            return view('home.cart',['kong'=>'kong']);
        }
    }
     
    /*
     *通过查询购物车 拼接信息
    */
    public static function cartinfo($res)
    {
        $info = [];
        foreach($res as $k => $v){
            $tem = $v;
            $res1 = DB::table('goods')->where('id',$v->gid)->first();
            $tem->title = $res1->title;
            $tem->price = $res1->price;
            $tem->pic = $res1->pic;
            $info[] = $tem;
        }
        return $info;
    }

    /*
     *删除购物车
    */
    public function getDelete(Request $request)
    {
        //获取购物车id
        $id = $request->input('id');
        //删除操作
        $res = DB::table('cart')->where('id',$id)->delete();
        if($res){
            echo 1;
        }else{
            echo 0;
        }
    }
}
