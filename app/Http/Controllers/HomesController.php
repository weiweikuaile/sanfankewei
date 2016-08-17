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

    
      
    
    /*
    * 前台友情链接列表
    */
    public function getHomeindex()
    {
      //$keywords与orderBy冲突;
      /************************
      $keywords=$request->keywords;
      dd(Links::orderBy('order','asc')->get());
      if(!empty($keywords)){
        $data = Links::orderBy('order','asc')->where('name','like','%'.$request->input("keywords").'%')->paginate($num);
      }else{
        $data = Links::orderBy('order','asc')->paginate($num);
      }
      或者用
      if($keywords){
        $data=Links::where('name','like','%'.$request->input("keywords").'%')->orderBy('order','asc')->paginate($num);
      }else{
        $data=Links::orderBy('order','asc')->paginate($num);
      }
      
      **************************
      */
      /*
       $num = $request->input('num',5);
      $data = Links::orderBy('order','asc')
            ->where(function($query) use($request){
                //判断是否有where条件
                if($request->input('keywords')){
                    $query->where('name','like','%'.$request->input('keywords').'%');
                }
            })->paginate($num);
     */
      //$links = Links::orderBy('order','asc')->get();
      //dd($links);
      $links = DB::table('links')->get();
      //$data = Links::orderBy('order','asc')->paginate($num);
     //return view('admin.links.index',compact('data','request'));
       //return view('admin.links.index',['data'=>$data,'request'=>$request]);
       return view('layout.homeindex',['links'=>$links,'request'=>$request]);
    }



}
