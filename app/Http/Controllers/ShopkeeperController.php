<?php

namespace App\Http\Controllers;

use Auth;
use Illuminate\Http\Request;

class ShopkeeperController extends Controller
{
    public function manufacturer()
    {
        return view('shopkeeper.manufacturer');
    }
    public function products()
    {
        $products = Auth::user()->products()->paginate(15);

        $links = array();
        foreach($products->all() as $product)
        {
            $product->load('tags');
            $product->load('image');
            $product->load('files');
            $links[] = [ 'href' => url('/api/v1/products/'.$product->id) ];
        }
        
        $products->links = [
            'self' => url('/api/v1/products'),
            'items' => $links
        ];
        return view('shopkeeper.products')->with([ 'products' => $products->toJson() ]);
    }
}
