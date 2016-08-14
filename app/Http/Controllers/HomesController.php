<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\Http\Requests;
use App\Http\Controllers\Controller;

class HomesController extends Controller
{
    /*
    * 前台首页
    */
    public function getIndex()
    {
    	//查询商品分类
    	$res = DB::table('cate')->get();
    	// dd($res);
    	$cates = self::cates($res,0);
    	// dd($cates);
        return view('welcome',['cates'=>$cates]);
    }

  	
  	/*
	 *获取分类数据
  	*/
  	public static function cates($res,$pid)
  	{
  		//查询所有分类
  		// dd($res);
  		$arr = [];
  		foreach($res as $k=>$v){
  			if($v->pid == $pid){
  				$v->sub = self::cates($res,$v->id);
  				$arr[] = $v;
  			}
  		}
  		//返回
  		return $arr;
  	}


}
