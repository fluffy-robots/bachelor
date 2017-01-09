<?php

use App\Tag;
use App\User;
use App\Product;

use Illuminate\Database\Seeder;

class ProductSeed extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
    	$users = User::all();

    	foreach ($users as $user) 
    	{
	        $products = factory(Product::class, 150)->create([
		    	'user_id' => $user->id
        	]);

	        foreach ($products as $product) 
	        {
	    		$tags = factory(Tag::class, 5)->create([
	    			'user_id' => $user->id
				]);
	        	foreach ($tags as $tag) 
	        	{
	        		$product->add_tag($tag);
	        	}
	        }

    	}
    }
}
