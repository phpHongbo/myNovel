<?php

namespace App\Model\Admin;

use Illuminate\Database\Eloquent\Model;

class Boss extends Model
{
    /**
     * 与模型关联的数据表
     *
     * @var string
     */
    protected $table = 'boss';

    protected $primary = 'id';
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
     * 小说表信息
     * @return [type] [description]
     */
    public function novelinfo (){
        return $this->hasOne('App\Model\Admin\Novel','id','nid');
    }
}
