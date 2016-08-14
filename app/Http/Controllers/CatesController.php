<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\Http\Requests;
use App\Http\Controllers\Controller;

class CatesController extends Controller
{
    /*
    * 商品分类列表
    */
    public function getIndex(Request $request)
    {
        $num = $request->input('num','10');
        $keywords = $request->keywords;
        //按路径查询信息
        // $info = DB::select('select *,concat(path,",",id) as paths from cate order by paths limit '.$num);
        // $info = DB::table('cate')->paginate(5);
        // $info = DB::table('cate')->get();
        $info = DB::table('cate')
            ->select(DB::raw('*,concat(path,",",id) as paths'))
            ->where('name','like','%'.$keywords.'%')
            ->orderBy('paths')
            ->paginate($num);
    	$cates = self::doinfo($info);
        return view('admin.cate.index',['cates'=>$cates,'request'=>$request]);
    }

    /*
    * 商品分类添加
    */
    public function getAdd()
    {	
        //按路径查询信息
        $info = DB::select('select *,concat(path,",",id) as paths from cate order by paths');
    	$cates = self::doinfo($info);
    	return view('admin.cate.add',['cates'=>$cates]);
    }

    /*
    * 商品分类查询并数据处理
    */
    public static function doinfo($cates)
    {
    	//拼接名称 显示层级关系
    	foreach($cates as $k => $v){
    		$len = count(explode(',',$v->path))-1;
    		$v->name = str_repeat('|-----',$len).$v->name;	
    	}
    	return $cates;
    }

    /*
    * 商品添加插入操作
    */
    public function postInsert(Request $request)
    {
    	$info = $request->only("pid","name");
    	//查询父级分类的路径 拼接自己的路径
    	if($request->pid > 0){
	    	$str = DB::table('cate')->where('id',$request['pid'])->first();
	    	$str = $str->path.','.$request['pid'];
	    	$info['path'] = $str;
    	}else{
    		$info['path'] = "0";
    	}
    	//数据入库
    	$res = DB::table('cate')->insert($info);
    	//判断
    	if($res){
    		return redirect('/admin/cates/index')->with('success','添加成功');
    	}else{
    		return back()->with('error','添加失败');
    	}
    }

    /*
    * 商品删除操作
    */
    public function postDelete(Request $request)
    {
        $id = $request->input('id');
        //执行删除
        $res = DB::table('cate')->where('id',$id)->delete();
        //判断
        if($res){
            echo 1; 
        }else{
            echo 0;
        }
    }

    /*
    * 商品修改页面
    */
    public function getEdit(Request $request)
    {
        //查询商品信息
        $res = DB::table('cate')->where('id',$request->input('id'))->first();
        //按路径查询信息
        $info = DB::select('select *,concat(path,",",id) as paths from cate order by paths');
        $cates = $this->doinfo($info);
        return view('admin.cate.edit',['cates'=>$cates,'pid'=>$request->pid,'res'=>$res]);
    }

    /*
     *执行数据修改
    */
    public function postUpdate(Request $request)
    {
        $date = $request->only("pid","name");

        $res = DB::table('cate')
             ->where('id',$request->input('id'))
             ->update($date);
        //判断
        if($res ==1){
            return redirect('/admin/cates/index')->with("success",'修改成功');
        }else{
            return back()->with('error','修改失败');
        }
    }

}
