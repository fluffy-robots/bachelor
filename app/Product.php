<?php

namespace App;

use App\Tag;
use App\User;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
	protected $guarded = [];
	public function user(){
		return $this->belongsTo(User::class);
	}

	public function tags(){
		return $this->belongsToMany(Tag::class);
	}

    public function add_tag($tag){
    	return $this->tags()->save($tag);
    }
}
