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
        $this->middleware('permission:Lista de galeria de carrucel|Crear galeria de carrucel|Ver galeria de carrucel|Editar galeria de carrucel|Eliminar galeria de carrucel', ['only' => ['index']]);
        $this->middleware('permission:Crear galeria de carrucel', ['only' => ['create','store']]);
        $this->middleware('permission:Editar galeria de carrucel', ['only' => ['edit','update']]);
        $this->middleware('permission:Eliminar galeria de carrucel', ['only' => ['destroy']]);
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
        if ($request->active == 1) {
            Slider::where('active')->update([
                'active' => 0
            ]);
        }
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
        if ($request->active == 1) {
            Slider::where('active')->update([
                'active' => 0
            ]);
        }
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