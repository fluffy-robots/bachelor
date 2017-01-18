<?php

use App\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DevSeed extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Developers
        $martin = New User([
        	'name' => 'Martin Kenth Knudsen',
        	'email' => 'admin@webkenth.dk',
        	'password' => Hash::make('password'),
            'role' => 'admin',
            'api_token' => str_random(60)
    	]);
        $martin->save();


        $morten = New User([
        	'name' => 'Morten Skøtt Gregersen',
        	'email' => 'mooorten@gmail.com',
        	'password' => Hash::make('password'),
            'role' => 'admin',
            'api_token' => str_random(60)
    	]);
        $morten->save();


        $jonas = New User([
            'name' => 'Jonas Boyer Hansen',
            'email' => 'jb1497@gmail.com',
            'password' => Hash::make('password'),
            'role' => 'admin',
            'api_token' => str_random(60)
        ]);
        $jonas->save();

        $admin = New User([
            'name' => 'Administrator Adminson',
            'email' => 'admin@admin.dk',
            'password' => Hash::make('password'),
            'role' => 'admin',
            'api_token' => str_random(60)
        ]);
        $admin->save();

        $manufacturer = New User([
            'name' => 'Manufacturer',
            'email' => 'manu@manu.dk',
            'password' => Hash::make('password'),
            'role' => 'manufacturer',
            'api_token' => str_random(60)
        ]);
        $manufacturer->save();

        $shopkeeper = New User([
            'name' => 'shopkeeper',
            'email' => 'shop@shop.dk',
            'password' => Hash::make('password'),
            'role' => 'shopkeeper',
            'api_token' => str_random(60)
        ]);
        $shopkeeper->save();

        $moebelsalg = New User([
            'name' => 'Martin Gade @Møbelsalg',
            'email' => 'martin@moebelsalg.dk',
            'password' => Hash::make('password'),
            'role' => 'shopkeeper',
            'api_token' => str_random(60)
        ]);
        $moebelsalg->save();
        $bodyman = New User([
            'name' => 'Thomas Fisker @Bodyman',
            'email' => 'thomas@bodyman.dk',
            'password' => Hash::make('password'),
            'role' => 'shopkeeper',
            'api_token' => str_random(60)
        ]);
        $bodyman->save();
    }
}
