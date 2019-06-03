<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Model;

class Versions extends Model
{
    //1,手动设置链接表的表名
	public $table = 'versions';
	//2,手动设置find()方法需要的主键名
	public $primaryKey = 'id';
	//3,设置模型表不要求时间字段显示
	public $timestamps = true;
	//4,设置模型时间格式		时间戳格式
	//protected  $dataFomat = 'U';

	//版本表关联商品详情表--关系一对多
	public function goods_details()
	{
		return $this->hasMany('App\Models\Admin\Goods_details','versions_id');
	}
}
