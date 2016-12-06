<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Like extends Model
{
    protected $table = 'likes';

    protected $fillable = ['id', 'target_type', 'target_id', 'user_id'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
