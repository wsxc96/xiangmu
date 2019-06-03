<?php

namespace App\Models\Admin;
 
    

use Illuminate\Database\Eloquent\Model;

class order_info extends Model
{
    
    //指定数据表名称
    protected $table = 'order_info';
    //设置主键  
    protected $primarkey = 'id';
    //关闭自动保护时间戳
    public $timestamps = false;

	  //关联用户表
    public function finduser()
  	{
    	return $this->belongsTo('App\Models\Admin\User', 'id', 'uid');
  	}

    //设置订单订单详情与商品详情(一对多)
    public function findgoods()
    {
      return $this->belongsTo('App\Models\Admin\Goods', 'gid', 'id');
    }

     //设置订单订单详情与订单详情(一对多)
    public function findorder()
    {
      return $this->belongsTo('App\Models\Admin\Order', 'orders_id','id' );
    }

  	
}
