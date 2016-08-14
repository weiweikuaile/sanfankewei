<?php

namespace App\Http\Controllers;
use App\Models\Goods;
use Illuminate\Http\Request;
use DB;
use App\Http\Requests\GoodsPostRequest;
use App\Http\Requests;
use App\Http\Controllers\Controller;

class GoodsordersController extends Controller
{
    /*
    * 确认订单信息页面
    */
    public function getIndex(Request $request)
    {   
        //验证是否有选择商品
        if(empty($request->all())){
            return back()->with('error','请选择商品');
        }

        //获取选取的商品的购物车id
        $arr = $request->input('info');
        $str = '('.implode(',',$arr).')';
        //查询选取的商品信息
        $res = DB::select('select * from cart where id in '.$str);
        //获取选取商品的具体信息
        $info = GoodscartsController::cartinfo($res);
        //商品总价
        $zprice = self::zprice($info);
        session(['goodsinfo'=>$info,'zprice'=>$zprice]);
        //获取用户地址
        $address = self::getAlladdress(session('id'));
        //解析模板 分配变量
        return view('home.order',['address'=>$address,'info'=>$info,'zprice'=>$zprice]);
    }
     
    /*
     *计算商品的总价
    */
    public static function zprice($res)
    {
        $zprice = 0;
        foreach($res as $k=>$v){
            $zprice += $v->num*$v->price;
        }
        return $zprice;
    }

    /*
	 *增加收货地址
    */
    public function postAddress(Request $request)
    {
    	// dd($request->all());
    	$data = $request->except(['_token']);
    	$data['uid'] = session('id');
    	//检测用户是否创建过地址
    	$res1 = DB::table('address')->where('uid',session('id'))->first();
    	if($res1){
    		$data['isdefault'] = 0;
    	}else{
    		$data['isdefault'] = 1;
    	}
    	$res = DB::table('address')->insert($data);
    	if($res){
			return redirect('/order'); 		
    	}
    }

    /*
	 *获取用户收货地址信息
    */
    public static function getAlladdress($id)
    {
    	return DB::table('address')->where('uid',$id)->get();
    }

    /*
	 *更换用户默认地址
    */

}
