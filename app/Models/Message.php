<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Message extends Model
{
    protected $fillable = ['email', 'content', 'user_id'];

    public function user()
    {
        return $this->belongsTo('App\Models\User');
    }
}
