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

    }

    public function uploadFile(Request $request)
    {

        $file = $request->file('file');
        $parent_id = ($request->parent_id != 0) ? $request->parent_id : null;

        $user = Auth::user();
        $user_directory = Str::slug($user->name);

        $name = $file->getClientOriginalName();

        if(substr($file->getMimeType(), 0, 5) == 'image'){
            $type = 'image';
        }else{
            $type = 'file';
        }

        $storage_path = ($parent_id) ? '/media/'.$user_directory.'/'.$parent_id : '/media/'.$user_directory;

        $path = $file->store($storage_path, 'public');

        $file = new File([
            'name' => $name,
            'type' => $type,
            'path' => '/storage/'.$path,
            'parent_id' => $parent_id,
            'user_id' => $user->id
        ]);
        $file->save();
    }

    public function createFolder(Request $request)
    {
        $user = Auth::user();
        $user_directory = Str::slug($user->name);

        $file_name = Uuid::generate(4);

        $type = ($request->type) ? $request->type : 'undefined';

        $folder = new File([
            'name' => $request->name,
            'type' => 'folder',
            'path' => 'public/media/'.$user_directory,
            'parent_id' => ($request->parent_id != 0) ? $request->parent_id : null,
            'user_id' => $user->id
        ]);
        $folder->save();

        $path = 'public/media/'.$user_directory.'/'.$folder->id;
        if(!Storage::makeDirectory($path))
        { 
            $folder->delete();
            return response('Unable to create Directory', 500); 
        }
        $folder->path = $path;
        $folder->save();
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
        $file = File::find($id);
        $file->delete();
    }
}