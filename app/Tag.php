<?php

namespace App;

use App\User;
use App\Product;
use Illuminate\Database\Eloquent\Model;

class Tag extends Model
{
    public function user()
    {
    	return $this->belongsTo(User::class);
    }
    public function products()
    {
    	return $this->belongsToMany(Product::class);
    }
}
