<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Model;

class Users extends Model
{
    /**
     * 与模型关联的数据表
     *
     * @var string
     */
    protected $table = 'users';

    protected $primaryKey = 'uid';

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
     * 用户与角色的多对多关联
     */
    public function users_role()
    {
        //                             关联的模型路径       模型的关联表名  主键名      外键名  
        return $this->belongsToMany('App\Models\Admin\Role','users_role', 'usersid', 'roleid');
    }
}
