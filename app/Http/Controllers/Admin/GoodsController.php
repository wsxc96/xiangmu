<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
//使用模型表
use App\Models\Admin\Goods;
use App\Models\Admin\Goods_Details;
use App\Http\Requests\StoreGoods;
use App\Http\Controllers\Admin\Goods_typesController;
use App\Models\Admin\Versions;
use DB;

class GoodsController extends Controller
{
    /**
     * 浏览数据,并显示到模板
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        // $data = Goods_details::get();
        // dd($data);

        $sousuo = $request->input('sousuo');
        $paginte = $request->input('paginte','10');
        //获取数据
        $data = Goods::where('gname','like','%'.$sousuo.'%')->paginate($paginte);
        // dd($data);
        // foreach ($data as $k => $v) {
        //    dump($v->goods_details->version);
        // }
        
        //加载,模板
        return view('admin.goods.index',['data'=>$data,'sousuo'=>$request->all(),'title'=>'商品浏览']);
    }

    /**
     * 显示添加模板
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //实例化Goods_typesController类
        $types = new Goods_typesController;
        // dd($types::getCates());

        return view('admin.goods.create',['data'=>$types::getCates(),'title'=>'商品添加']);
    }

    /**
     * 执行添加到数据库
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreGoods $request)
    {
        
        //将数据压入闪存;
        $request->flash();
        //处理上传数据
        //判断是否有文件上传
        if(!$request->file('images')){
            return back()->with('error','抱歉,请选择上传文件!');
        }
        //处理单上传文件
        $file = $request->file('images');
        
        //获取文件后缀
        $hou = $file->extension();
        //dd($hou);
        //创建新名字
        $names = '/uploads/images'.'/'.rand(1000,9999).time().'.'.$hou;
        
        $res = $file->storeAs('images',$names);


        

        
        // goods添加数据
        //接收数据并生成数组
        
        $arr = [];
        $arr = $request->only(['gname','price','stock','sales','content','status']);  
        //写入图片数据
        $arr['images'] = $names;
        $arr['num'] = rand(1000,9999).time();
        $arr['goods_types_id'] = $request->input('pid');
        // $arr['version'] = rand(1000,9999).time();
        //开启事务
        // DB::beginTransaction();
        $res = DB::table('goods')->insertGetId($arr);
        
        
        
        
        // $goods_details = new Goods_Details;

        // $goods_details->goods_id = $brr['goods_id'];

        // $goods_details->files = $brr['files'];
        // $goods_details->num = $brr['num'];
        // $res2 = $goods_details->save();
        // dd($res2);


        if($res){
            //提交事务
                // DB::commit();
            return redirect('/admin/goods')->with('success','添加商品成功!');
        }else{
            //回滚事务
                // DB::rollBack();
            return back()->with('error','添加商品失败!');
        }


        

        

        
        //接收数据
 

    }

    /**
     * 加载详情模板
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //拿数据
        // //拿两个表的数据--商品表和版本表
        // $data = Goods::with('versions')->where('id',$id)->get();
        //拿版本表数据
        $goods = Goods::find($id);
        $good = $goods->versions()->get();
        

        
        return view('admin.goods.show',['good'=>$good,'goods'=>$goods,'title'=>'商品详情']);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(StoreGoods $request, $id)
    {

        //处理上传数据
        if(! $request->file('images')){
            return back()->with('error','抱歉,请选择新的上传文件!');
        }

         //删除图片所在的位置
        $res = Goods::find($id);
        $data = @unlink('./public/images'.$res->images);
            if(!$data){

                echo '删除路径图片失败!';
            }

        //处理单上传文件
        $file = $request->file('images');
        
        //获取文件后缀
        $hou = $file->extension();
        //创建新名字
        $names = '/uploads/images'.'/'.rand(1000,9999).time().'.'.$hou;
        
        $res = $file->storeAs('images',$names);


        // goods添加数据
        //接收数据并生成数组
        $arr = [];
        $arr = $request->only(['gname','price','stock','content','status','num','sales']);  
        $arr['goods_types_id'] = $request->input('pid');
        //写入图片数据
        $arr['images'] = $names;
        // dump($id);
        // dd($arr);

        //开启事务
        // DB::beginTransaction();
        // $res = DB::table('goods')->insertGetId($arr);
        $res = DB::table('goods')->where('id',$id)->update($arr);


        if($res){
            //提交事务
                // DB::commit();
            return redirect('/admin/goods')->with('success','修改商品成功!');
        }else{
            //回滚事务
                // DB::rollBack();
            return back()->with('error','修改商品失败!');
        }

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    /**
     * 无刷新删除
     */
    function del(Request $request,$id)
    {
       
        //开启事务
        DB::beginTransaction();
        $aa = Versions::where('goods_id',$id)->get();
        
        //1删除goods_details数据
        foreach ($aa as $kk => $vv) {
            // //删除图片所在的位置
            $a = Goods_details::where('versions_id',$vv->id)->get();
            // $aa = $res->goods_details;
            foreach ($a as $k => $v) {
               @unlink('./public/files'.$v->files);
            }

            //删除goods_details表数据
            $res3 = DB::table('goods_details')->where('versions_id','=',$vv->id)->delete();
        }
        

        //2删除version表数据
        $res2 = DB::table('versions')->where('goods_id','=',$id)->delete();

        //3删除图片所在的位置
        $res = Goods::find($id);
        $data = @unlink('./public/images'.$res->images);
            if(!$data){

                echo '删除路径图片失败!';
            }
        //删除goods数据

        $res = DB::table('goods')->where('id','=',$id)->delete();
       
        

        //删除goods_details数据
        if($res && $res2 && $res3){
            //提交事务
                  DB::commit();
            echo 'success';
            
        }else{
            //回滚事务
                  DB::rollBack();
            echo 'error';
             
        }
    }
    /**
     * 加载修改模板
     */
    public function edi($id)
    {
       
        //查询对应数据
        $goods = Goods::find($id);
       
        $pid = $goods->goods_types_id;
        //实例化类别对象
         $types = new Goods_typesController;
        
        //加载模板
        return view('admin.goods.edit',['data'=>$goods,'datas'=>$types::getCates(),'id'=>$pid,'title'=>'商品修改']);
    }

    /**
     * 显示版本添加模板
     */
    public function version($id)
    {
        $uid = $id;
        return view('admin.goods.version',['id'=>$uid]);
    }
    /**
     * 执行版本添加数据
     */
    public function doversion(Request $request,$id)
    {
        //开启事务
        DB::beginTransaction();
        $color = $request->input('color');
        $co = '';
        foreach ($color as $k => $v) {
            $co .= $v.',';
        }

        //接收数据
        $data = $request->except('_token');
        //拼接数据
        $ver = [];
        $ver['goods_id'] = $id;
        $ver['color'] = $co;
        $ver['version'] = $data['version'];
        //添加数据到versions表
        // $res = Versions::insert($ver);
        $version = DB::table('versions')->insertGetId($ver);
        

        //判断是否有文件上传
        if(!$request->file('files')){
            return back()->with('error','抱歉,请选择上传文件!');
        }
        //处理多上传文件
        $files = $request->file('files');
        
        //遍历
        $vname = [];
        foreach($files as $k=>$v)
        {
            //获取文件后缀
            $hou = $v->extension();
            //创建新名字
            $name = '/uploads/images'.'/'.rand(1000,9999).time().'.'.$hou;
            $vname[] .= $name;

            $res = $v->storeAs('files',$name);
        }
        
        $sum = count($vname);
        //dump(count($vname));
        //接收
        // $color = $request->input('color');
        // $num = count($color);
       
        
        
        //goods_details表添加数据
        for ($i=0; $i < $sum; $i++) { 
            $brr = [];
            $brr['files'] = $vname[$i];
            
           
            $brr['versions_id'] = $version;

           
            $res2 = DB::table('goods_details')->insert($brr);
        }

        
        if($version && $res2){
            //提交事务
                 DB::commit();
            return redirect('/admin/goods')->with('success','添加版本成功!');
        }else{
            //回滚事务
                 DB::rollBack();
            return back()->with('error','添加版本失败!');
        }

        


    }
}

