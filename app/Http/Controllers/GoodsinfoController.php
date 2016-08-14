<?php

namespace App\Http\Controllers;
use App\Models\Goods;
use Illuminate\Http\Request;
use DB;
use App\Http\Requests\GoodsPostRequest;
use App\Http\Requests;
use App\Http\Controllers\Controller;

class GoodsinfoController extends Controller
{
    /*
    * 商品详情首页
    */
    public function getIndex(Request $request)
    {
        //查询商品分类
        $res = DB::table('cate')->get();
        // dd($res);
        $cates = HomesController::cates($res,0);
        $id = $request->input('id');
        $res = DB::table('goods')->where('id',$id)->first();
        return view('home.goodsinfo',['info'=>$res,'cates'=>$cates]);
    }

    /*
     *商品添加到购物车
    */
    public function postInsert(Request $request)
    {
        //验证用户是否登录
        if(empty(session('id'))){
            echo '2';
            exit;
        }

        //提取数据
        $data['num'] = $request->input('num');
        $data['gid'] = $request->input('id');
        $data['uid'] = session('id');

        //判断伤心是否存在于购物车
        $res1 = DB::table('cart')->where(['uid'=>$data['uid'],'gid'=>$data['gid']])->first();
        if($res1){
            //存在 计算同一件商品数量
            $data['num'] = $res1->num+$data['num'];
            //修改数据库数据
            $res2 = DB::table('cart')->where('id',$res1->id)->update($data);
        }else{
            //不存在 添加数据
            $res = DB::table('cart')->insert($data);
        }
        
        //给ajax请求返回数据
        echo 1;
    }

}
