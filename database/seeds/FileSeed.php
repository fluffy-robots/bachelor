<?php

use App\User;
use App\File;
use Illuminate\Database\Seeder;

class FileSeed extends Seeder
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
	        $image = New File([
	        	'name' => 'Test Billede',
	        	'path' => '/images/0/test.png',
	        	'type' => 'image',
	        	'user_id' => $user->id,
	        	'parent_id' => NULL
	    	]);
	        $image->save();

	        $file = New File([
	        	'name' => 'Test Fil',
	        	'path' => '/images/0/test.png',
	        	'type' => 'pdf',
	        	'user_id' => $user->id,
	        	'parent_id' => NULL
	    	]);
	        $file->save();

	        $folder = New File([
	        	'name' => 'Test Folder',
	        	'path' => '/images/0/test.png',
	        	'type' => 'folder',
	        	'user_id' => $user->id,
	        	'parent_id' => NULL
	    	]);
	        $folder->save();
    	}
    }
}
