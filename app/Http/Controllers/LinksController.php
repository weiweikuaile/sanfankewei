<?php

namespace App\Http\Controllers;
use App\Models\Links;
use Illuminate\Http\Request;
use DB;
use Illuminate\Support\Facades\Input;
use App\Http\Requests;
use App\Http\Controllers\Controller;

class LinksController extends Controller
{
    /*
    * 后台友情链接列表
    */
    public function getIndex(Request $request)
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
      
      $num = $request->input('num',5);
      $data = Links::orderBy('order','asc')
            ->where(function($query) use($request){
                //判断是否有where条件
                if($request->input('keywords')){
                    $query->where('name','like','%'.$request->input('keywords').'%');
                }
            })->paginate($num);
      //$data = Links::orderBy('order','asc')->paginate($num);
     //return view('admin.links.index',compact('data','request'));
       return view('admin.links.index',['data'=>$data,'request'=>$request]);
    }
   /*
    * 后台友情链接添加
    */
   public function getAdd()
   {
   	return view("admin.links.add");
   }
   /*
     *添加数据插入操作
    */
   public function postInsert(Request $request)
   {
     	//$data=$request->all();
      //$data['token']=str_random(50);
      $data=$request->except('_token');

      $data['pic']=$this->upload($request);
      //dd($data);
     $res=Links::orderBy('order','asc')->insert($data);
      //dd($res);
     if($res){
        return redirect('/admin/links/index')->with('success','添加成功');
     }else{
        return back()->with('error','添加失败');
     }

    }
   /*
     * 删除操作
    */
    public function getDelete(Request $request)
    {
        // dd($request->all());
        $id = $request->input('id');
        $links = Links::find($id);
        $res = $links->delete();
        //判断
        if($res){
            return redirect('admin/links/index')->with('success','删除成功');
        }else{
            return back()->with('error','修改失败');
        }
    }

     /**
    *图片上传操作
    */
    public function upload(Request $request)
    {
      //检测是否有文件上传
      //dd($request->all());
      if($request->hasFile('pic')){
        //文件名称
        $name=md5(time()+rand(11111,8999999));
        //文件后缀名获取
        $suffix=$request->file('pic')->getClientOriginalExtension();
        $arr=['jpg','jpeg','png','gif','pdf'];
        //判断文件上传类型
        if(!in_array($suffix,$arr)){
          //echo '上传文件不符合要求';die;
          return back()->with('error','上传文件不符合要求');
        }

        //将指定文件移到到指定位置
        $request->file('pic')->move('./uploads/',$name.'.'.$suffix);
      //将文件路径及文件名称返回

        return '/uploads/'.$name.'.'.$suffix;
      }else{
        return '/uploads/default.jpg';
      }
      
    }

    /*
     * 修改页面
    */
    public function getEdit(Request $request)
    {
        
   
        //查询
        $id=$request->input('id');
        $links = Links::find($request->input('id'));
        //解析模板 分配数据
        //dd($links);
        return view('admin.links.edit',['links'=>$links]);

    }

    /*
     * 进行数据修改
    */
    public function postUpdate(Request $request)
    {
        // dd($request->all());
        //提取数据
        /*$goods = new Goods();
        $goods = $goods->find($request->input('id')) ;
        $goods->title = $request->input('title');
        $goods->cid = $request->input('cid');
        $goods->price = $request->input('price');
        $goods->num = $request->input('num');
        $goods->content = $request->input('content');
        $goods->status = 1;*/
        //判断是否有文件上传
        //dd($request->hasFile('pic'));
        
        
        //$res = $goods->save();
        $data=$request->except('_token');
        $id=$request->input('id');
        if($request->hasFile('pic')){
          $data['pic']=$this->upload($request);
           //$request->pic =$this->upload($request);
        }else{
           $data['pic'] = $request->input('pic');
          
        }
        //dd($id);
        $res=Links::where('id',$id)->update($data);
        //判断
        if($res){
            return redirect('admin/links/index')->with('success','修改成功');
        }else{
            return back()->with('error','修改失败');
        }
    }	

    /*
    *ajax删除链接
    *
    */
    public function postDelete(Request $request)
    {
      //dd($request->input('id'));
      //var_dump($request->input('id'));
      $id=$request->input('id');
      $res=Links::where('id',$id)->delete();
      //判断返回
      if($res){
        $data = [
                'status' => 0,
                'msg' => '友情链接删除成功！',
            ];
      }else{
        $data = [
                'status' => 1,
                'msg' => '友情链接删除失败，请稍后重试！',
            ];
      }
      return $data;

    } 

   
   public function postChangeorder()
   {
    

    $input=Input::all();
    //dd($input);
    //echo $input['id'];
    
    $links=Links::find($input['id']);
    $links->order=$input['order'];
    $re=$links->update();
      if($re){
        $data=[
          'status'=> 0,
          'msg'=>'友情链接排序更新成功!',
          ];
      }else{
        $data=[
        'status'=> 1,
        'msg'=>'友情链接排序更新失败，请稍后重试！',
        ];
        
      }
      return $data;
   }

   public function show()
   {

   }

}
