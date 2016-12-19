<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ShopkeeperController extends Controller
{
    public function products()
    {
        return view('shopkeeper.products');
    }
    
    public function manufacturer()
    {
        return view('shopkeeper.manufacturer');
    }
}
