<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ManufacturerController extends Controller
{
    public function products()
    {
        $products = '[{"name":"Product","image":"/images/0/test.png","description":"Lorem ipsum dolor sit amet, consectetur adipisicing elit. Optio perspiciatis odio perferendis a! Suscipit nihil a ab, eos, quae, nemo esse facere expedita consequatur corrupti magnam corporis iusto! Tenetur, necessitatibus!","tags":[{"id":1,"name":"product"},{"id":2,"name":"product"},{"id":3,"name":"product"}],"ean":"5741000124024","updated_at":"12-15-2016 10:07:42","meta":[{"weight":{"unit":"kg","value":100}},{"measurement":{"height":10,"width":10,"length":10,"unit":"m"}}]}]';
        return view('manufacturer.products',compact('products'));
    }

    public function media()
    {
        return view('manufacturer.media');
    }

    public function shopkeeper()
    {
        return view('manufacturer.shopkeeper');
    }
}
