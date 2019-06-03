<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Model;

class Car extends Model
{
     //指定数据表名称
    protected $table = 'shop_cart';
    //设置主键  
    protected $primarkey = 'id';
    //关闭自动保护时间戳
    public $timestamps = false;

    //设置购物车表和用户表关联一对一
    public function hasOneuser()
  	{
      	return $this->belongsto('App\Models\Admin\User', 'uid', 'id');
    }
    
    //设置购物车表和商品表关联 一对多
    public function hasManygoods()
    {
      return $this->belongsto('App\Models\Admin\Goods', 'gid', 'id');
    }


}
