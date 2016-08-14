<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\LoginPostRequest;
use DB;
use Hash;
use Mail;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use Gregwar\Captcha\CaptchaBuilder;

class HomesloginController extends Controller
{	
	//前台注册
	public function getRegister()
	{
		return view('home.register');
	}

	//处理注册操作
	public function postDoregister(LoginPostRequest $request)
	{
		//检测验证码是否正确
		// if($request->input('vcode')!=session('Vcode'))
		// {
		// 	return back()->with('error','验证码不正确');
		// }
		//处理数据
		$data=$request->only(['email','password']);
		$data['password']=Hash::make($data['password']);
		$data['token']=str_random(50);//验证用户
		$data['status']=1;
		//dd($data);//有数据
		$id=DB::table('user')->insertGetId($data);
		if($id){
			//注册成功，发送激活邮件
			$this->sendmail($id,$data['token'],$request->input('email'));
			//return view('home.success',["$data['token']"=>$users,"$request->input('email')"=>$email]);
			return view('home.success');
		}else{
			return back()->with('error','注册失败,请联系管理员');
		}
	}

	//验证码
	public function getVcode()
	{
		ob_clean();//清除输出缓存区的内容
	    //生成验证码图片的Builder对象，配置相应属性
        $builder = new CaptchaBuilder;
        //可以设置图片宽高及字体
        $builder->build($width = 100, $height = 40, $font = null);
        //获取验证码的内容
        $phrase = $builder->getPhrase();

        //把内容存入session
        session(['Vcode'=>$phrase]);
        //生成图片
        header("Cache-Control: no-cache, must-revalidate");
        header('Content-Type: image/jpeg');
        $builder->output();   
	}

	//失去焦点验证验证码
	public function postVvcode(Request $request)
	{
		$verify = $request->input('verify');

		if($verify == session('Vcode')){
			echo "1";
		}else{
			echo "0";
		}
	}

	//发送邮件测试
	public function sendmail($id,$token,$email)
	{
		//发送模板
		if($id){
			Mail::send('home.email.index', ['id'=>$id,'token'=>$token,'email'=>$email], function ($message)use($email) {
	            $message->to($email)->subject('注册账号激活邮件');
	        });

		}else{
		    	Mail::send('home.email.indexpwd', ['id'=>$id,'token'=>$token,'email'=>$email], function ($message)use($email) {
		            $message->to($email)->subject('修改账号密码邮件');
		        });
		}
	}

	//激活
	public function getJihuo(Request $request)
	{
		$id = $request->input('id');

		$user = DB::table('user')->where('id',$id)->first();
		//dd($request->input('token'));
		//判断
		if($user){
			if($request->input('token') == $user->token)
			{ 
				//修改状态
				$arr = ['status'=>2,'token'=>str_random(50)];
				if(DB::table('user')->where('id',$id)->update($arr)){
					return view('home.email.successjihuo'); 
				}else{
					echo '哎呦，姿势不对，看看原因';
				}
			}else{
				echo '您的链接已经失效';
			}
		}else{
			echo '没有查询到您的信息';
		}
	}

	//前台登录页面
	public function getLogin(){
		return view('home.login');
	}

	//前台登录处理，
	public function postDologin(Request $request)
	{
		$user=DB::table('user')
			->where('email',$request->input('email'))
			->first();
			//检查用户是否存在
		if(!empty($user)){
			//检测密码是否一致
			if(Hash::check($request->input('password'),$user->password)){
				//登录成功
				session(['id'=>$user->id,'username'=>$user->username]);
				//跳转页面
				return redirect('/');
			}else{
				return back()->with('error','邮箱名或密码错误1');
			}
		}else{
			return back()->with('error','邮箱名或密码错误2');
		}
	}

	//前台找回密码
	public function getYanemail(Request $request)
	{
		return view('home.yanemail');
	}

	//处理操作
	public function postDoyanemail(Request $request)
	{
		$email = $request->input('email');
		//dd($verify);
		$data=DB::table('user')
			->where('email',$email)
			->first();
			//dd($data);
		//$id=$data->id;
		$id=0;
		//$data['token']=str_random(50);
		$token=$data->token;
		if(!empty($data)){
			 $this->sendmail($id,$token,$email);
			echo "1";
			// return view('home.successpwd');
			// return redirect('/home/successpwd')->with('success','恭喜您找回密码的邮箱验证成功');
			
		}else{
			echo "0";
			// return back()->with('error','邮箱名不正确');
		}
	}

	//修改密码
	public function getJihuopwd(Request $request)
	{
		$email=$request->input('email');
		$user=DB::table('user')->where('email',$email)->first();
		if($user)
		{
			if($request->input('token') == $user->token)
			{
				return view('home.updatepwd',['email'=>$email]);
			}else{
				echo '您的链接已经失效';
			}
		}else{
				echo '没有查询到您的信息';
		}
	}
	//
	public function getUpdatepwd(Request $request)
	{
		return view('home.updatepwd');
	}
	
	public function postDoupdatepwd(Request $request)
	{	
		//dd($request->input('password'));
		//dd($request->input('repassword'));
		
		if($request->password == $request->repassword){
			$password=Hash::make($request->input('password'));

			$sss['password']=$password;
			// dd($request->email);
			$res=DB::table('user')->where('email',$request->email)->update($sss);
			if($res)
			{
				return redirect('/login/login')->with('success','成功找回密码，欢迎归来');
			}else{
				return back()->with('error','修改密码失败');
			}
		}else{
			return back()->with('error','两次输入密码不一致，请重新输入');
		}
	}

	public function getSuccesspwd(){
		return view('home.successpwd');
	}



	//前台用户注销
	public function getOut()
	{
        session(['id'=>'','username'=>'']);
        return back();
	}

}