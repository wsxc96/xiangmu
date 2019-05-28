<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Admin\Order;

//引入order模型
use App\Models\Admin\order_info;
//引入order_info模型
use Illuminate\Http\Request;

class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        //每页信息数
        $data = $request->input('paginte', '10');
        // // 搜索框值
        $data2 = $request->input('sousuo');

        $data = order::where('addr', 'like', '%' . $data2 . '%')->paginate($data);
        //使用模型查询所有数据

        // dd($rs);

        //显示列表页
        return view('admin/order/list', ['title' => '浏览订单', "rs" => $data, 'sousuo' => $request->all()]);

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
    public function show($id, Request $request)
    {

        // 查询两个关联表的数据
        $rs = order::find($id);
        $rss = $rs->hasManyorder;

        $as = order_info::where('orders_id', $id)->get();

        //dd($as);
        // $ass = $as->finduser;

        // $css = $as ->findgoods;

        return view('admin/order_info/list', ['data' => $rs, 'data2' => $rss, 'data3' => $as]);
        // dd($rs);

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //通过id先查询出相对应的数据
        $rs = order::find($id);
        //dd($rs);

        return view('admin/order/edit', ['title' => '订单修改', 'rs' => $rs]);

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $re, $id)
    {

        $rs = order::find($id);

        $rs['rec'] = $re['rec'];
        $rs['addr'] = $re['addr'];
        $rs['tel'] = $re['tel'];
        // $rs['tel'] = $re['tel'];
        $rs['status'] = $re['status'];
        $rs->save();

        return redirect("/admin/order");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        // $type = order::find($id);
        // $type->delete();

        // $data = order_info::where('orders_id',$id)->get();
        // $data->delete();

        $type = order::find($id);
        $type->delete();
        $res = $type->hasManyorder()->delete();

        return redirect("/admin/order");

    }

}
