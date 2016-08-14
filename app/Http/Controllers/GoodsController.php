<?php

namespace App\Http\Controllers;
use App\Models\Goods;
use Illuminate\Http\Request;
use DB;
use App\Http\Requests\GoodsPostRequest;
use App\Http\Requests;
use App\Http\Controllers\Controller;

class GoodsController extends Controller
{
    /*
    * 商品列表
    */
    public function getIndex(Request $request)
    {
        $num = $request->input('num',10);
        //查询数据
        $goods = Goods::OrderBy('id','desc')
            ->where(function($query) use($request){
                //判断是否有where条件
                if($request->input('keywords')){
                    $query->where('title','like','%'.$request->input('keywords').'%');
                }
            })->paginate($num);
            
        return view('admin.goods.index',['goods'=>$goods,'request'=>$request]);
    }

    /*
    * 商品添加
    */
    public function getAdd()
    {
        //在线添加模板时要有分类列表
        $info = DB::select('select *,concat(path,",",id) as paths from cate order by paths');
        $cates = CatesController::doinfo($info);
        return view('admin.goods.add',['cates'=>$cates]);
    }

    /*
     *添加数据插入操作
    */
    public function postInsert(GoodsPostRequest $request)
    {
        //实例化模型对象
        $goods = new Goods();
        $goods->title = $request->input('title');
        $goods->cid = $request->input('cid');
        $goods->price = $request->input('price');
        $goods->num = $request->input('num');
        $goods->content = $request->input('content');
        $goods->status = 1;
        $goods->pic = '/imgs/shop_imgs/'.$this->upload($request,'./imgs/shop_imgs');

        $res = $goods->save();
        //判断
        if($res){
            return redirect('/admin/goods')->with('success','添加成功');
        }else{
            return back()->with('error','添加失败');
        }  
    }

    /*
     *图片上传操作
    */
    public function upload(Request $request,$src)
    {
        //检测是否有上传文件
        if($request->hasFile('pic')){
            //文件名
            $name = md5(time()+rand(1,12345678));
            //获取文件后缀名
            $suffix = $request->file('pic')->getClientOriginalExtension();
            $arr = ['gif','jpg','png'];
            //判断上传文件类型
            if(!in_array($suffix,$arr)){
                return back()->with('error','上传类型错误');
            }
            //见文件移动到指定位置
            $request->file('pic')->move($src,$name.'.'.$suffix);
            return $name.'.'.$suffix;
        }

    }

    /*
     * 删除操作
    */
    public function getDelete(Request $request)
    {
        // dd($request->all());
        $id = $request->input('id');
        $goods = Goods::find($id);
        $res = $goods->delete();
        //判断
        if($res){
            return redirect('admin/goods/index')->with('success','删除成功');
        }else{
            return back()->with('error','修改失败');
        }
    }

    /*
     * 修改页面
    */
    public function getEdit(Request $request)
    {
        //在线添加模板时要有分类列表
        $info = DB::select('select *,concat(path,",",id) as paths from cate order by paths');
        $cates = CatesController::doinfo($info);
        //查询
        $goods = Goods::find($request->input('id'));
        //解析模板 分配数据
        return view('admin.goods.edit',['goods'=>$goods,'cates'=>$cates]);

    }

    /*
     * 进行数据修改
    */
    public function postUpdate(GoodsPostRequest $request)
    {
        // dd($request->all());
        //提取数据
        $goods = new Goods();
        $goods = $goods->find($request->input('id')) ;
        $goods->title = $request->input('title');
        $goods->cid = $request->input('cid');
        $goods->price = $request->input('price');
        $goods->num = $request->input('num');
        $goods->content = $request->input('content');
        $goods->status = 1;
        //判断是否有文件上传
        if($request->hasFile('pic')){
            $goods->pic = '/imgs/shop_imgs/'.$this->upload($request,'./imgs/shop_imgs');
        }else{
            $goods->pic = $request->input('pic');
        }

        $res = $goods->save();
        //判断
        if($res){
            return redirect('admin/goods/index')->with('success','修改成功');
        }else{
            return back()->with('error','修改失败');
        }
    }


}
