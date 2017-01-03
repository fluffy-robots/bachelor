<?php

namespace App\Http\Controllers;

use Auth;
use App\File;
use Uuid;

use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;


class FileController extends Controller
{
    public function index()
    {
        //
    }

    public function create()
    {
        //
    }

    public function store(Request $request)
    {
        $user = Auth::guard('api')->user();
        $user_directory = Str::slug($user->name);

        $file_name = Uuid::generate(4);

        $type = ($request->type) ? $request->type : 'undefined';

        $file = new File([
            'name' => $request->name,
            'type' => $type,
            'path' => 'public/media/'.$user_directory,
            'parent_id' => ($request->parent_id != 0) ? $request->parent_id : null,
            'user_id' => $user->id
        ]);
        $file->save();

        $path = 'public/media/'.$user_directory.'/'.$file->id;
        if(!Storage::makeDirectory($path))
        { 
            $file->delete();
            return response('Unable to create Directory', 500); 
        }
        $file->path = $path;
        $file->save();
    }

    public function show($id)
    {
        //
    }

    public function edit($id)
    {
        //
    }

    public function update(Request $request, $id)
    {
        //
    }

    public function destroy($id)
    {
        //
    }
}