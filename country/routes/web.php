<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/ 
//前台
//前台首页

Route::resource('/','Home\DefaultsController');

//前台登录
Route::get('/home/login','Home\LoginController@login');
Route::post('/home/ulogin','Home\LoginController@ulogin');
Route::post('/home/plogin','Home\LoginController@plogin');
Route::post('/home/elogin','Home\LoginController@elogin');
//找回密码 
// Route::get('/home/retrieve','Home\RetrieveController@retrieve');
// Route::post('/home/doretrieve','Home\RetrieveController@doretrieve');
// Route::get('/home/retrieves','Home\RetrieveController@retrieves');
// Route::post('/home/doretrieves','Home\RetrieveController@doretrieves');
//获取登录验证码
Route::get('/home/captcha','Home\LoginController@captcha');
//前台注册 - 邮箱
Route::get('/home/regist','Home\RegistController@regist');
Route::post('/home/doregist','Home\RegistController@doregist');
Route::get('/home/doremind','Home\RegistController@doremind');
Route::get('/home/codes','Home\RegistController@codes');
Route::get('/home/queren','Home\RegistController@queren');



//商品列表
Route::get('home/goods/list/{id}','Home\GoodsController@list');
//商品详情
Route::get('home/goods/details/{id}','Home\GoodsController@show');
//李根      结束

//推荐和列表的购物车 
Route::get('home/goods/two/{id}','Home\GoodsController@two');
//前台搜索
Route::post('home/goods/sou','Home\GoodsController@sou');

//前台
Route::group(['middleware'=>'home'], function(){
	//个人中心
	Route::resource('/home/user','Home\UserController');
	//修改密码
	Route::get('/home/upwd', 'Home\UpwdController@upwd');
	Route::post('/home/doupwd', 'Home\UpwdController@doupwd');

// 王兴晨   开始
	//前台购物车管理
	Route::resource('/homes/car','Home\CarController');

	//删除购物车的方法
	Route::post('/homes/remcart','Home\CarController@remcart');

	// 将购物车信息存到cook
	Route::post('/homes/shmcart','Home\CarController@shmcart');
	//购物车后的收货地址
	Route::post('/homes/addr','Home\CarController@addr');

	//订单完成
	Route::get('/homes/ok','Home\CarController@ok');

	//前台订单管理
	Route::resource('/homes/dingdan','Home\DingdanController');
	//前台收货
	Route::get('/homes/shouhuo/{id}','Home\DingdanController@shouhuo');
	//删除订单
	Route::get('/homes/sanchu/{id}','Home\DingdanController@shanchu');
	// Route::get('/homes/again','Home\CarController@again');

//王兴晨  结束


//李根    开始
	//	前台删除
	Route::post('home/collect/del','Admin\CollectsController@del');
	//加入购物车
	// Route::get('home/goods/cart/{id}','Home\GoodsController@cart');
	Route::post('home/goods/cart','Home\GoodsController@cart');
	//前台收藏浏览   李根开始
	Route::get('home/collect/look','Admin\CollectsController@look');
	//商品收藏-无刷新
	Route::post('/home/goods/collect','Home\GoodsController@collect');
	//商品收藏-普通提交
	Route::get('/home/goods/collected/{id}','Home\GoodsController@collected');
//李根    结束
	
	//前台退出
	Route::get('/home/logout','Home\LoginController@logout');
});


//商城后台主模板
Route::get('/admin','Admin\LayoutController@index');


//后台登陆
Route::get('/admin/logins','Admin\LoginController@login');
Route::post('/admin/dlogin','Admin\LoginController@dlogin');
//获取验证码
Route::get('/admin/captcha','Admin\LoginController@captcha');
//无权限跳回页面
Route::get('/admin/power','Admin\RoleController@power');
//后台   ['login','roleper'] 登录和权限的验证
Route::group(['middleware'=>['login',]], function(){
	//后台的首页
	Route::get('/admin','Admin\LayoutController@index');
	//管理员管理
	Route::resource('/admin/users', 'Admin\UsersController');
	Route::get('/admin/usersrole', 'Admin\UsersController@users_role');//管理员浏览页的角色按钮
	Route::post('/admin/douserrole', 'Admin\UsersController@do_users_role');//处理上面传来的数据
	//角色管理
	Route::resource('/admin/role','Admin\RoleController');
	Route::get('/admin/roleper','Admin\RoleController@role_per');//角色浏览页的权限按钮
	Route::post('/admin/doroleper','Admin\RoleController@doroleper');//处理上面传来的数据
	//权限管理
	Route::resource('/admin/permission','Admin\PermissionController');
	//用户管理
	Route::resource('/admin/user', 'Admin\UserController');
	//修改头像
	Route::get('/admin/uface','Admin\LoginController@uface');
	Route::post('/admin/upload','Admin\LoginController@upload');
	//修改密码
	Route::get('admin/upwd','Admin\LoginController@upwd');
	Route::post('admin/doupwd','Admin\LoginController@doupwd');

// 王兴晨 开始
	//订单管理
	// Route::get('/admin/order/shanchu', 'Admin\OrderController@shanchu');
	Route::resource('/admin/order', 'Admin\OrderController');

	// 订单详情
	Route::resource('/admin/orderinfo', 'Admin\OrderinfoController');
	//订单发货
	Route::get('/admin/order/fahuo/{id}', 'Admin\OrderController@fahuo');

	//用户管理
	Route::resource('/admin/users', 'Admin\UsersController');

	//购物车管理
	Route::resource('/admin/car','Admin\CarController');

	//后台测试删除购物车2
	//Route::resource('/admin/car/del/{id}','Admin\CarController@del');

	//友情链接管理
	Route::resource('/admin/lianjie','Admin\LianjieController');
	//友情链接删除
	Route::get('/admin/lianjie/del/{id}','Admin\LianjieController@del');
//  王兴晨   结束
	
//  李根     开始
	//隔离区
	//后台商品管理
	//版本添加
	Route::get('admin/goods/version/{id}','Admin\GoodsController@version');
	Route::post('admin/goods/doversion/{id}','Admin\GoodsController@doversion');
	//修改
	Route::get('admin/goods/edi/{id}','Admin\GoodsController@edi');
	//删除
	Route::get('admin/goods/del/{id}','Admin\GoodsController@del');
	Route::resource('admin/goods','Admin\GoodsController');

	//类别管理
	//删除
	Route::get('admin/goods_types/del/{id}','Admin\Goods_typesController@del');
	//添加
	Route::get('admin/goods_types/create/{id}/{a}','Admin\Goods_typesController@create');
	//类别资源
	Route::resource('admin/goods_types','Admin\Goods_typesController');

	//轮播图管理
	Route::post('admin/round/kai','Admin\RoundsController@kai');
	Route::post('admin/round/guan','Admin\RoundsController@guan');
	Route::get('admin/round/edi/{id}','Admin\RoundsController@edi');
	Route::post('admin/round/del','Admin\RoundsController@del');
	Route::resource('admin/round','Admin\RoundsController');

	//收藏的前后台管理
	//后台浏览

	Route::get('admin/collect/index','Admin\CollectsController@index');
//  李根    结束

	//退出
	Route::get('/admin/logout','Admin\LoginController@logout');
});



























































































































