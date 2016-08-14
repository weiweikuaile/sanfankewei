<?php

namespace App\Http\Controllers;
use App\Models\Goods;
use Illuminate\Http\Request;
use DB;
use App\Http\Requests\GoodsPostRequest;
use App\Http\Requests;
use App\Http\Controllers\Controller;

class GoodspayController extends Controller
{
    /*
    * 支付页面
    */
    public function postIndex(Request $request)
    {

        //生成订单
        $data = $request->only('pay','address');
        $data['ordernum'] = time().rand(1000000,9999999);
        $data['time'] = time();
        $data['zprice'] = session('zprice');
        $data['status'] = 0;
        $data['uid'] = session('id');
        $id = DB::table('order')->insertGetId($data);

        if($id){
            $goodsinfo = session('goodsinfo');
            foreach($goodsinfo as $k => $v){
                $gid[] = $v->id;
                $tmp['oid'] = $id;
                $tmp['gid'] = $v->gid;
                $tmp['num'] = $v->num;
                $goods[] = $tmp;
            }

            $str = '('.implode(',',$gid).')';
            //插入订单详情
            $res1 = DB::table('order_goods')->insert($goods);
            if($res1){
                $res2 = DB::delete('delete from cart where id in '.$str);
                if($res2){
                    session(['goodsinfo','']);
                    return view('home.goodspay',['id'=>$id]);
                }else{
                    return redirect('cart')->with('error','您选择的货物已经提交');
                }  
            }
        }
    }
    
    /*
     *
    */
    public function postPaysuccess(Request $request)
    {
        $id = $request->input('id');
        //修改订单状态
        $res = DB::table('order')->where('id',$id)->update(['status'=>1]);
        if($res){
            echo 1;
        }else{
            echo 2;
        }
    }

}
