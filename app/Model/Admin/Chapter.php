<?php

namespace App\Model\Admin;

use Illuminate\Database\Eloquent\Model;

class Chapter extends Model
{
    /**
     * 与模型关联的数据表
     *
     * @var string
     */
    protected $table = 'chapter';

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
     * 不可被批量赋值的属性t。
     *
     * @var array
     */
    protected $guarded = [];
    /**
     * 小说章节信息
     * @return [type] [description]
     */
    public function chapterinfo (){
        return $this->hasOne('App\Model\Admin\Chapters','cid','id');
    }
}
