<?php

namespace App\Http\Controllers;

use App\User;
use Auth;
use Illuminate\Http\Request;

class ManufacturerController extends Controller
{
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
        return view('manufacturer.products')->with([ 'products' => $products->toJson() ]);
    }

    public function media()
    {
        return view('manufacturer.media');
    }

    public function shopkeeper()
    {
        // $shopkeepers = User::whereIn('role', ['admin','shopkeeper'])->get();

        $shopkeepers = User::whereIn('email', ['martin@moebelsalg.dk','thomas@bodyman.dk'])->get();
        return view('manufacturer.shopkeeper', compact('shopkeepers'));
    }

    public function files(Request $request)
    {
        $parent_id = ($request->parent_id && $request->parent_id != null) ? $request->parent_id : null;
        
        $query = Auth::user()->files->where('parent_id', $parent_id)->all();
        
        $files = array();
        
        foreach($query as $file){ $files[] = $file; }
        
        return $files;
    }
}
