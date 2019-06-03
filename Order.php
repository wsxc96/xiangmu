<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Model;

class order extends Model
{
    
  //指定数据表名称
  protected $table = 'order';
  //设置主键  
  protected $primarkey = 'id';
  //关闭自动保护时间戳
  public $timestamps = false;
    
      
  //设置订单与订单详情一对多关系
  public function hasManyorder()
  {
    return $this->hasMany('App\Models\Admin\order_info','orders_id','id');
  }

  //设置订单表与用户表属于关系
  public function user()
  {
    return $this->beLongsTo('App\Models\Admin\User','user_id');
  }

}
