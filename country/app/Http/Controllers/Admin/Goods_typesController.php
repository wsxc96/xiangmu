<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Admin\Goods_types;
use DB;
class Goods_typesController extends Controller
{
    /**
     * 提取公共部分.类别细化
     */
    public static function getCates()
    {
        //取数据
        $data = Goods_types::select('*',DB::raw("concat(path,',',id) as cates"))->orderBy('cates','asc')->get();

        //分类细微处理
        foreach($data as $k=>$v){
            /*dump($data[$k]->path);*/
            $n = substr_count($v->path,',');
            /*dump(str_repeat('|----',$n));*/
            $data[$k]->cname = str_repeat('|----',$n).$v->cname;
        }
        return $data;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        //

        $sousuo = $request->input('sousuo');
        $paginte = $request->input('paginte','10');

        $data = Goods_types::select('*',DB::raw("concat(path,',',id) as cates"))->orderBy('cates','asc')->where('cname','like','%'.$sousuo.'%')->paginate($paginte);

        //分类细微处理
        foreach($data as $k=>$v){
            /*dump($data[$k]->path);*/
            $n = substr_count($v->path,',');
            /*dump(str_repeat('|----',$n));*/
            $data[$k]->cname = str_repeat('|----',$n).$v->cname;
        }


        return view('admin.goods_types.index',['data'=>$data,'sousuo'=>$request->all(),'title'=>'类别浏览']);

    }

    /**
     * 加载添加页面
     *
     * @return \Illuminate\Http\Response
     */
    public function create($id = 0,$a = 0)
    {
        // $data = self::getCates();
        // foreach($data as $k=>$v){
        //     dd($v);
        // }
        // dd(self::getCates());
        //加载模板
        //并且分配数据
        return view('admin.goods_types.create',['data'=>self::getCates(),'id'=>$id,'a'=>$a,'title'=>'商品添加']);
    }

    /**
     * 执行添加数据
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        $data = $request->all();

        //判断pid
        if($data['pid'] == 0){
            $data['path'] = '0,';
        }else{

            //获取父类的数据
            $parent_data = Goods_types::find($data['pid']);
            //拼接自己的path字段
            $data['path'] = $parent_data->path.$parent_data->id.',';
        }

        $class = new Goods_types;
        $class->cname = $data['cname'];
        $class->pid = $data['pid'];
        $class->status = $data['status'];
        $class->path = $data['path'];
        $res = $class->save();
        if($res){
            return redirect('admin/goods_types')->with('success','类型添加成功!');
        }else{
            return back()->with('error','类型添加失败!');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
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
    public function update(Request $request, $id)
    {
        //
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
     * 删除
     */
    public function del($id)
    {

        //如果有子分类不能删除
        $no = Goods_types::where('pid',$id)->first();
        
        if($no){
            return back()->with('error','下有分类不能删除!');
        }

        $res = Goods_types::destroy($id);

        if(!$res){
            return back()->with('error1','类型删除失败!');
        }else{
            
            return redirect('admin/goods_types')->with('success','类型删除成功!');
        }
    }
}
