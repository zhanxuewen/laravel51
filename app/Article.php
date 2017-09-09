<?php

namespace App;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

class Article extends Model
{
    //
    protected $fillable = [
        'title',
        'intro',
        'content',
        'published_at',
        'user_id',
    ];

    protected $dates = ['published_at'];
    // set  + 字段名  + Attribute
    // 设置好形式再入库：
    public function setPublishedAtAttribute($date)
    {
//        dd($date); // 发布时间 "2017-09-08"
        $this->attributes['published_at'] = Carbon::createFromFormat('Y-m-d',$date);
    }

    //scope + 方法名（控制器里的名字）
    public function scopePublished($query){
        $query->where('published_at','<=', Carbon::now());
    }

    public function tags()
    {
        return $this->belongsToMany('App\Tag');
    }
    public function user()
    {
        return $this->belongsTo('App\User');
    }
}
