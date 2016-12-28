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
	        $tag_1 = New Tag([
	        	'name' => 'Test Tag #1',
	        	'user_id' => $user->id
	    	]);
	        $tag_1->save();
	        $tag_2 = New Tag([
	        	'name' => 'Test Tag #2',
	        	'user_id' => $user->id
	    	]);
	        $tag_2->save();
	        $tag_3 = New Tag([
	        	'name' => 'Test Tag #3',
	        	'user_id' => $user->id
	    	]);
	        $tag_3->save();

	        $product = New Product([
	        	'name' => 'Test Produkt',
	        	'user_id' => $user->id,
	        	'description' => 'Test Produkt Med Flot Beskrivelse',
	        	'image' => '/images/0/test.png',
	            'ean' => '0123456789012'
	    	]);
	        $product->save();

	        $product->add_tag($tag_1);
	        $product->add_tag($tag_2);
	        $product->add_tag($tag_3);
    	}
    }
}
