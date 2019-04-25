<?php

namespace App\Model\Admin;

use Illuminate\Database\Eloquent\Model;

class Users extends Model
{
    /**
     * 与模型关联的数据表
     *
     * @var string
     */
    protected $table = 'users';

     /**
     * 该模型是否被自动维护时间戳
     *
     * @var bool
     */
    public $timestamps = false;

    /**
     * 不可被批量赋值的属性。
     *
     * @var array
     */
    protected $guarded = [];

    /**
     * 主键
     * @var string
     */
    protected $primaryKey  = 'id';

    /**
     * 获得与用户关联的用户详情。
     */
    public function usersInfo()
    {
        return $this->hasOne('App\Model\Admin\UsersInfo','uid','id');
    }
}
