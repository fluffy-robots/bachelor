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
        	'name' => 'Martin',
        	'email' => 'admin@webkenth.dk',
        	'password' => Hash::make('password'),
            'role' => 'admin'
    	]);
        $martin->save();


        $morten = New User([
        	'name' => 'Morten',
        	'email' => 'mooorten@gmail.com',
        	'password' => Hash::make('password'),
            'role' => 'admin'
    	]);
        $morten->save();


        $jonas = New User([
            'name' => 'Jonas',
            'email' => 'jb1497@gmail.com',
            'password' => Hash::make('password'),
            'role' => 'admin'
        ]);
        $jonas->save();

        $manufacturer = New User([
            'name' => 'Manufacturer',
            'email' => 'manu@manu.dk',
            'password' => Hash::make('password'),
            'role' => 'manufacturer'
        ]);
        $manufacturer->save();

        $shopkeeper = New User([
            'name' => 'shopkeeper',
            'email' => 'shop@shop.dk',
            'password' => Hash::make('password'),
            'role' => 'shopkeeper'
        ]);
        $shopkeeper->save();
    }
}
