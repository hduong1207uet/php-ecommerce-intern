<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'phone_number',
        'avatar'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    /**
     * Get the Orders from User.
     */
    public function orders() 
    {
        return $this->hasMany(Order::class);
    }

    /**
     * Get the Comments from User.
     */
    public function comments() 
    {
        return $this->hasMany(Comment::class);
    }

    /**
     * Get the Orders from User.
     */
    public function rates() 
    {
        return $this->hasMany(Rate::class);
    }
}
