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
    		$folders = factory(File::class, 5)->create([
    			'type' => 'folder',
    			'user_id' => $user->id
			]);
			
    		$images = factory(File::class, 5)->create([
    			'type' => 'image',
    			'user_id' => $user->id
			]);

			$pdfs = factory(File::class, 5)->create([
				'type' => 'pdf',
				'user_id' => $user->id
			]);

			$excels = factory(File::class, 5)->create([
				'type' => 'excel',
				'user_id' => $user->id
			]);

			$file = factory(File::class, 5)->create([
				'type' => 'file',
				'user_id' => $user->id
			]);
    	}
    }
}
