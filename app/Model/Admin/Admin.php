<?php

namespace App\Model\Admin;

use Illuminate\Database\Eloquent\Model;

class Admin extends Model
{
    /**
     * 与模型关联的数据表
     *
     * @var string
     */
    protected $table = 'admin';

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
     * 获取管理员对应的角色
     * @return [type] [description]
     */
    public function getrole()
    {
        return $this->belongsToMany('App\Model\Admin\Role', 'user_role','uid','rid');
    }
}
