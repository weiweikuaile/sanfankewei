<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

//后台登录
Route::controller('/admin/logins','LoginsController');
//前台登录页
Route::controller('/login','HomesloginController');

//后台路由组
Route::group(['middleware'=>'adminlogin'],function(){
	//后台首页
	Route::controller('/admin/','AdminsController');
	//后台用户管理
	Route::controller('/admin/users','UsersController');
	//后台商品分类
	Route::controller('/admin/cates','CatesController');
	//后台商品管理
	Route::controller('/admin/goods','GoodsController');
	//后台订单管理
	Route::controller('/admin/orders','OrdersController');
	//后台商品评论
	Route::controller('/admin/comments','CommentsController');
	//后台购物车管理
	Route::controller('/admin/carts','CartsController');
	//后台友情链接管理
	Route::controller('/admin/links','LinksController');
});

//前台列表页
Route::controller('/list','ListsController');
//前台详情页
Route::controller('/info','GoodsinfoController');
//购物车页
Route::controller('/cart','GoodscartsController');
//订单页
Route::controller('/order','GoodsordersController');
//支付页
Route::controller('/pay','GoodspayController');
//个人中心
Route::Controller('/members','MembersController');

//前台首页
Route::controller('/','HomesController');



