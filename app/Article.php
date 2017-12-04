<?php

namespace App;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

class Article extends Model
{
    //设置可填充字段
    protected $fillable =['title','content','published_at','user_id','category','tags'];
    //laravel会把dates里的字段按Carbon对象来处理
    //这样就可调用Carbon对象的内置方法
    protected $dates=['published_at'];

    //Model 默认提供了get set 方法
    public function setPublishedAtAttribute($date)
    {
        $this->attributes['published_at'] =Carbon::createFromFormat('Y-m-d',$date);
    }

    /*
     * 固定格式scope+方法名($query)
     * 相当于加了一个条件
     * 在Controller的index页面进行过滤
     */
    public function scopePublished($query)
    {
        $query->where('published_at','<=',Carbon::now());
    }
    public  function scopeSearchColumn($query,$column,$condition,$character)
    {
        if (strtoupper($character)=='LIKE')
            $query->where($column,$character,'%'.$condition.'%');
        else
            $query->where($column,$character,$condition);
    }
    public  function scopeCondition($query,$condition)
    {
        $query->where('content','like','%'.$condition.'%');
    }
    public  function user()
    {
        return $this->belongsTo('App\User');
    }
}
