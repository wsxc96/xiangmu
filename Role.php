<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    /**
     * 与模型关联的数据表
     *
     * @var string
     */
    protected $table = 'role';

    protected $primaryKey = 'id';

    /**
     * 该模型是否被自动维护时间戳
     *
     * @var bool
     */
    public $timestamps = false;

    /**
     * 可以被批量赋值的属性。
     *
     * @var array
     */
    // protected $fillable = ['uname','password','age','class'];

    /**
     * 不可被批量赋值的属性。
     *
     * @var array
     */
    protected $guarded = [];

    /**
     *  角色和权限的关联
     *
     * @return \Illuminate\Http\Response
     */
    public function role_per()
    {
        //                                关联的模型路径         模型的关联表名  主键名     外键名
        return $this->belongsToMany('App\Models\Admin\Permission','role_per', 'roleid', 'perid');
    }
}
