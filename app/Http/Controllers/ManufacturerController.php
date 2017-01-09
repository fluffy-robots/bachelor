<?php

namespace App\Http\Controllers;

use Auth;
use Illuminate\Http\Request;

class ManufacturerController extends Controller
{
    public function products()
    {
        // $products = '[{"name":"Product","image":"/images/0/test.png","description":"Lorem ipsum dolor sit amet, consectetur adipisicing elit. Optio perspiciatis odio perferendis a! Suscipit nihil a ab, eos, quae, nemo esse facere expedita consequatur corrupti magnam corporis iusto! Tenetur, necessitatibus!","tags":[{"id":1,"name":"product"},{"id":2,"name":"product"},{"id":3,"name":"product"}],"ean":"5741000124024","updated_at":"12-15-2016 10:07:42","meta":[{"weight":{"unit":"kg","value":100}},{"measurement":{"height":10,"width":10,"length":10,"unit":"m"}}]}]';

        // $products = Auth::user()->products;
        // $products->load('tags');
        $products = Auth::user()->products()->paginate(15);

        foreach($products->all() as $product)
        {
            $product->load('tags');
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
        $files = Auth::user()->files;
        return view('manufacturer.media', compact('files'));
    }

    public function shopkeeper()
    {
        return view('manufacturer.shopkeeper');
    }

    public function files(Request $request)
    {
        $parent_id = ($request->parent_id && $request->parent_id != null) ? $request->parent_id : null;
        return Auth::user()->files->where('parent_id', $parent_id);
    }
}
