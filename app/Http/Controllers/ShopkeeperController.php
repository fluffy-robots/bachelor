<?php

namespace App\Http\Controllers;

use Auth;
use Illuminate\Http\Request;

class ShopkeeperController extends Controller
{
    public function products()
    {
    	$products = Auth::user()->products;
        $products->load('tags');
        return view('shopkeeper.products',compact('products'));
    }
    
    public function manufacturer()
    {
        return view('shopkeeper.manufacturer');
    }
}
