<?php

namespace App\Model\Admin;

use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    /**
     * 与模型关联的数据表
     *
     * @var string
     */
    protected $table = 'role';

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
     * 获取角色对应的权限
     * @return [type] [description]
     */
    public function getnode()
    {
        return $this->belongsToMany('App\Model\Admin\Node', 'role_node','rid','nid');
    }

    /**
     * 获取当前角色的管理员
     * @return [type] [description]
     */
    public function getadmin()
    {
        return $this->belongsToMany('App\Model\Admin\Admin','user_role','rid','uid');
    }
}
