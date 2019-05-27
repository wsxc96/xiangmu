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
//商城后台主模板

Route::get('/admin','Admin\LayoutController@index');
    
































































































































































































































































































































































































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


Route::resource('admin/goods_types','Admin\Goods_typesController');


//前台
//前台首页

Route::resource('/','Home\DefaultsController');

//商品列表
Route::get('home/goods/list/{id}','Home\GoodsController@list');
//商品详情
Route::get('home/goods/details/{id}','Home\GoodsController@show');
//加入购物车
// Route::get('home/goods/cart/{id}','Home\GoodsController@cart');
Route::post('home/goods/cart','Home\GoodsController@cart');









