<?php

namespace App;

use App\Tag;
use App\File;
use App\Product;
use Laravel\Passport\HasApiTokens;
use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable, HasApiTokens;

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

    public function tags(){
        return $this->hasMany(Tag::class);
    }
    public function products(){
        return $this->hasMany(Product::class);
    }

    public function add_product($product){
        return $this->products()->save($product);
    }
    public function add_tag($product){
        return $this->tags()->save($product);
    }

    public function files(){
        return $this->hasMany(File::class);
    }
    public function add_file($file){
        return $this->files()->save($file);
    }

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
