<?php

namespace App;

use App\Tag;
use App\File;
use App\User;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
	protected $guarded = [];
	public function user(){
		return $this->belongsTo(User::class);
	}

	public function image()
	{
		return $this->belongsTo(File::class);
	}

	public function files()
	{
		return $this->belongsToMany(File::class);
	}

	public function tags()
	{
		return $this->belongsToMany(Tag::class);
	}

	public function set_primary_image($image)
	{
		return $this->image()->associate($image);
	}
	
	public function add_files($file)
	{
		return $this->files()->save($file);
	}

    public function add_tag($tag)
    {
    	return $this->tags()->save($tag);
    }
}
