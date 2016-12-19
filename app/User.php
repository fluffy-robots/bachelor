<?php

namespace App;

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
        'name', 'email', 'password', 'role'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public function is_shopkeeper(){
        return ($this->role == 'shopkeeper' || $this->is_admin());
    }
    public function is_manufacturer(){
        return ($this->role == 'manufacturer' || $this->is_admin());
    }
    public function is_admin(){
        return ($this->role == 'admin');
    }
}
