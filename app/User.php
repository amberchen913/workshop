<?php

namespace App;

use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'username', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * A user can have many articles.
     *
     * @return \Illuminate\Database\Eloquent\Relation\HasMany
     */
    public function articles(){
        return $this->hasMany('App\Article');
    }

    public function isAManager(){
        return true;
    }
}
