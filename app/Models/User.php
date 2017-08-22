<?php

namespace App\Models;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password', 'avartar', 'role'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public function setPasswordAttribute($value)
    {
        if ($value) {
            $this->attributes['password'] = bcrypt($value);
        }
    }

    public function isAdmin()
    {
        return $this->role == config('settings.role.admin');
    }

    public function isAuthor()
    {
        return $this->role == config('settings.role.author');
    }
    
    public function getAvatarPath()
    {
        return asset(config('settings.avatar_path') . $this->avartar);
    }
    public function posts()
    {
        return $this->hasMany('App\Models\Post');
    }

    public function messages()
    {
        return $this->hasMany('App\Models\Message');
    }

    public function comments()
    {
        return $this->hasMany('App\Models\Comment');
    }

}
