<?php

namespace App\Http\Controllers;
use App\Models\Goods;
use Illuminate\Http\Request;
use DB;
use App\Http\Requests\GoodsPostRequest;
use App\Http\Requests;
use App\Http\Controllers\Controller;

class ListsController extends Controller
{
    /*
    * 商品列表页面
    */
    public function getIndex(Request $request)
    {   
        
        //dd($id);
    	//查询商品分类
    	$res = DB::table('cate')->get();
    	// dd($res);
    	$cates = HomesController::cates($res,0);
    	// dd($cates);

        $id=($request->all());
        //$list2=DB::table('cate')->where('pid',$id)->get();//获得二级分类的商品信息
        //dd($list2);
        $list3=DB::table('goods')->where('cid',$id)->get();//获得三级分类的商品信息
        //dd($list3);
        return view('home.list',['cates'=>$cates],['list'=>$list3]);
    }
     



}
