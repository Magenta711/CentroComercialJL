<?php

namespace App\Http\Controllers\admin_pages;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Controllers\filesController;
use App\Models\Pages\Slider;

class sliderController extends Controller
{
    public function __construct() {
        $this->middleware('auth');
        $this->middleware('verified');
    }
    public function index()
    {
        $sliders = Slider::get();
        return view('admin.pages.slider.index',compact('sliders'));
    }
    public function create()
    {
        return view('admin.pages.slider.create');
    }
    public function store(Request $request)
    {
        $request->validate([
            'title' => ['required'],
            'startdate' => ['required'],
            'file' => ['required'],
        ]);
        $id = Slider::create($request->all());
        $file = new filesController();
        $file->upload($request,$id->id,2);
        return redirect()->route('admin_slider')->with('success','Post guardado');
    }
    public function edit(Slider $id)
    {
        return view('admin.pages.slider.edit',compact('id'));
    }

    public function update(Request $request, Slider $id)
    {
        $request->validate([
            'title' => ['required'],
            'startdate' => ['required'],
        ]);
        $id->update($request->all());
        if ($request->hasFile('file')) {
            $file = new filesController();
            $file->reupload($request,$id->file);
        }
        return redirect()->route('admin_slider')->with('success','Post actualizado');
    }
    public function destroy(Slider $id)
    {
        $id->delete();
        return response()->json([ 'success'=>'Post eliminado' ]);
    }
}