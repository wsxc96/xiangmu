<?php

namespace App\Http\Controllers\Home;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\Http\Controllers\Home\DefaultsController;
use App\Models\Admin\Goods_types;
use App\Models\Admin\Goods;
use App\Models\Admin\Shop_cart;
use DB;

class GoodsController extends Controller
{
    /**
     * 前台商品列表模板页
     */
    public function list(Request $request,$id = 0)
    {	
        //搜索条件
        $sou = $request->input('sou');
        // dump($request->all());
        // $sousuo = $request->input('sousuo',0);
        // $paginate = $request->input('paginate',9);
        // dump($sousuo);
        // dump($paginate);
    	//接收前台id查询对应商品表的数据

        $type = Goods_Types::where('path','like',"%,$id,%")->select('id')->get();
        $arr = [];
        foreach($type as $k=>$v)
        {
            $arr[] = $v->id;
        }
        $arr[] = (int)$id;
        //定义搜索关系
        //dump($arr);
        // $a = Goods::where('goods_types_id',13)->get();
        // dd($a);

        //执行搜索
        $data = [];
        foreach($arr as $k=>$v){
            $data[] = Goods::where('goods_types_id',$v)->get();
            // $data[] = Goods::where('goods_types_id',$v)->orWhere('gname','like','%'.$sou.'%')->get();
            // if(!isset($sou)){
            //      $data[] = Goods::where('goods_types_id',$v)->get();
            // }else{
            //     $data[] = Goods::where('goods_types_id',$v)->orWhere('gname','like','%'.$sou.'%')->get();
            //     dump('我是else');
            // }
        }

        

        // $data = [];
        // foreach($arr as $k=>$v){
        //      $data[] = Goods::where('goods_types_id',$v)->get();
        // }
        //两次循环拿到数据
        // foreach($data as $k=>$v)
        // {
        //     foreach($v as $kk=>$vv)
        //     {
        //         dump($vv->images);
        //     }
        // }
        //dd($data);
        
        //$type = $id;
        
    	
    	
    	//实例化DefaultsController类
    	$de = new DefaultsController;

    	return view('home.goods.list',['data'=>$data,'title'=>'商品列表页','arr'=>$de::getType(0)]);
    	// return view('home.layout.index',['title'=>'商品列表页']);
    }
    /**
     * 加载商品详情页面
     */
    public function show($id)
    {

        // dd(session('uid'));
        //根据id查询数据

        $data = Goods::find($id);
        //dd($data->images);
        //$ver = $data->versions()->get();
        // foreach ($data->versions as $k => $v) {
        //     dd($v->version);
        // }
        //实例化DefaultsController类
        $de = new DefaultsController;

        return view('home.goods.details',['data'=>$data,'title'=>'商品详情页','arr'=>$de::getType(0)]);
    }

    /**
     * 执行添加数据到购物车
     */
    public function cart(Request $request)
    {
        //接收数据
        $gid = $request->input('id');
        $number = $request->input('number');
        
        //执行添加
        $shop_cart = New Shop_cart;
        $shop_cart->gid = $gid;
        $shop_cart->uid = session('uid');
        $shop_cart->otime = Date('Y-m-d H:i:s',time());
        $res = $shop_cart->save();

        if($res){
            echo 'success';
        }else{
            echo 'error';
        }
        
            
    }
}
