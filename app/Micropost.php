<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Micropost extends Model
{
    protected $fillable = ['content', 'user_id'];

    //Micropost のインスタンスが所属している唯一の User を取得(user:micropost = 1:多)
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
