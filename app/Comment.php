<?php

namespace App;

use App\Markdown\Parser;
use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    protected $fillable = ['body', 'user_id', 'discussion_id'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function discussion()
    {
        return $this->belongsTo(Discussion::class);
    }

//    public function setBodyAttribute($value){
//        dd((new Markdown\Markdown(new Parser))->markdown($value));
//        return (new Markdown\Markdown(new Parser))->markdown($value);
//    }
}
