<?php

namespace App\Http\Controllers;

use App\Models\File;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class filesController extends Controller
{
    public function upload(Request $request,$id,$type)
    {
        if ($request->hasFile('file')){
            $file = $request->file('file');
            $size = $file->getClientSize() / 1000;
            $name = time().'.'.$file->getClientOriginalExtension();
            Storage::putFileAs('public/upload/', $file, $name);
            File::create([
                'name' => $name,
                'fileble_type' => $this->getType($type),
                'fileble_id' => $id,
                'size' => $size,
                'type' => $file->getClientOriginalExtension(),
                'url' => '/storage/upload/',
            ]);
            return response()->json(['success'=>'Se subio el archivo correctamente']);
        }else {
            return response()->json(['success'=>'No se examino un archivo']);
        }
    }
    public function getType($type)
    {
        if ($type == 1) {
            return 'App\Models\Locals';
        }
    }
}