<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Comments extends Model
{
    protected $fillable = ['user_id','article_id','pid','context'];

    public  function user()
    {
        return $this->belongsTo('App\User');
    }
    public  function article()
    {
        return $this->belongsTo('App\Articles');
    }
}
