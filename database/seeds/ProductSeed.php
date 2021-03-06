<?php

use App\Tag;
use App\File;
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
            $file = factory(File::class, 1)->create([
                'user_id' => $user->id,
                'path' => '/images/0/test.png',
                'type' => 'image'
            ]);

	        $products = factory(Product::class, 10)->create([
		    	'user_id' => $user->id,
                'image_id' => $file->id
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
