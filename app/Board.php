<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Board extends Model
{
    protected $fillable = ['content','image',];

    /**
     * この投稿を所有するユーザ。（ Userモデルとの関係を定義）
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }
    
    public function favorite_users() 
    {
        return $this->belongsToMany(User::class, 'favorites', 'board_id','user_id')->withTimestamps();
    }
}


