<?php

namespace App\Http\Controllers;

use Auth;
use App\File;
use App\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $products = Auth::user()->products()->with('tags','image','files')->paginate(15);
        $links = array();
        foreach($products->all() as $product)
        {
            $product->load('tags');
            $links[] = [ 'href' => url('/api/v1/products/'.$product->id) ];
        }
        
        $products->links = [
            'self' => url('/api/v1/products'),
            'items' => $links
        ];
        
        return $products;
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // dd($request->all());
        $this->validate($request, [
            'name' => 'max:255',
            'ean' => 'integer',
        ]);

        $product = Product::create([
            'user_id' => $request->user()->id,
            'name' => $request->name,
            'ean' => $request->ean,
            'description' => $request->description,
        ]);
        $product->save();
        $product->load(['image', 'files']);
        return $product;
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $product = Product::find($id);
        $product->name = $request->name;
        $product->ean = $request->ean;
        $product->description = $request->description;
        $product->save();
        $product->load(['image', 'files']);
        return $product;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    public function addFile(Request $request)
    {
        $file = File::find($request->file['id']);
        $product = Product::find($request->product['id']);
        $product->add_files($file);
        return $product->files;
    }
    public function removeFile(Request $request)
    {
        $file = File::find($request->file['id']);
        $product = Product::find($request->product['id']);
        $product->files()->detach($file->id);
        return $product->files;
    }
    public function makePrimaryImage(Request $request)
    {
        $file = File::find($request->file['id']);
        $product = Product::find($request->product['id']);
        $product->set_primary_image($file);
        $product->save();
        return $product->image;
    }
}
