<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Model;

class Goods_types extends Model
{
    //
    //1,手动设置链接表的表名
	public $table = 'goods_types';
	//2,手动设置find()方法需要的主键名
	public $primaryKey = 'id';
	//3,设置模型表不要求时间字段显示
	public $timestamps = true;
	//4,设置模型时间格式		时间戳格式
	//public/protected  $dataFomat = 'U';
}
