<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Model;

class Collects extends Model
{
    //
    //1,手动设置链接表的表名
	public $table = 'collects';
	//2,手动设置find()方法需要的主键名
	public $primaryKey = 'id';
	//3,设置模型表不要求时间字段显示
	public $timestamps = true;
	//4,设置模型时间格式		时间戳格式
	//protected  $dataFomat = 'U';

    //关联用户表属于
	public function user()
	{
		return $this->beLongsTo('App\Models\Admin\User','users_id');
	}

    //关联商品一对一

	public function goods()
	{
		return $this->beLongsTo('App\Models\Admin\Goods','goods_id');
	}
}
