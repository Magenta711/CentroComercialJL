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
            return response()->json(['success'=>'Se subio el archivo']);
        }else {
            return response()->json(['success'=>'No se examino un archivo']);
        }
    }

    public function reupload(Request $request,$id)
    {
        if ($request->hasFile('file')){
            $file = $request->file('file');
            $size = $file->getClientSize() / 1000;
            $name = time().'.'.$file->getClientOriginalExtension();
            Storage::putFileAs('public/upload/', $file, $name);
            $id->update([
                'name' => $name,
                'size' => $size,
                'type' => $file->getClientOriginalExtension(),
            ]);
            return response()->json(['success'=>'Se subio el archivo']);
        }else {
            return response()->json(['success'=>'No se examino un archivo']);
        }
    }

    public function getType($type)
    {
        if ($type == 1) {
            return 'App\Models\Local';
        }
        if ($type == 2) {
            return 'App\Models\Pages\Slider';
        }
        if ($type == 3) {
            return 'App\Models\Publicity';
        }
        if ($type == 4) {
            return 'App\Models\Rent';
        }
        if ($type == 5) {
            return 'App\Models\Product';
        }
    }

    public function destroy(Request $request)
    {
        Storage::delete('public/upload/'.$request->name);
        File::where('name',$request->name)->delete();
        return response()->json(['success'=>'Good']);
    }
}