<?php

namespace App\Http\Controllers\Home;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\Models\Admin\Goods_types;

class DefaultsController extends Controller
{
    /**
     *  无限极分类的递归
     *
     * @return \Illuminate\Http\Response
     */
    public static function getType($pid)
    {
        
        //前台的遍历
        /*foreach ($rs as $key => $value) {
            # code...

            foreach ($v->sub_type as $key => $value) {
                # code...

                foreach ($v->sub_type as $key => $value) {
                    # code...
                }
            }
        }*/

        //获取顶级的分类
        $cate = Goods_types::where('pid',$pid)->get();
        
        $arr = [];

        foreach($cate as $k=>$v){

            if($v->pid==$pid){

                $v->sub=self::getType($v->id);

                $arr[]=$v;
            }
        }  
        return $arr;
    }

    /**
     * 加载前台浏览模板
     *
     * @return \Illuminate\Http\Response
     */
    public function index($pid = 0)
    {
        //
        $arr = self::getType($pid);

        //压入登录用户的id
        session(['uid' => '1']);

        return view('home.layout.index',['title'=>'国商首页','arr'=>$arr]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
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
}
