<?php

namespace App\Http\Controllers;

use App\Models\Local;
use Illuminate\Http\Request;

class localsController extends Controller
{
    public function __construct() {
        $this->middleware('auth');
        $this->middleware('verified');
    }
    public function index()
    {
        $locals = Local::get();
        return view('admin.locals.index',compact('locals'));
    }
    public function create()
    {
        return view('admin.locals.create');
    }
    public function store(Request $request)
    {
        $request->validate([
            'ubication' => ['required'],
            'code' => ['required'],
            'dimensions' => ['required'],
            'value' => ['required'],
            'type' => ['required'],
            'description' => ['required'],
        ]);
        Local::create($request->all());
        return redirect()->route('locals')->with('success','Local '.$request->code.' creado');
    }
    public function edit(Local $id)
    {
        return view('admin.locals.edit',compact('id'));
    }
    public function update(Request $request,Local $id)
    {
        $request->validate([
            'ubication' => ['required'],
            'code' => ['required'],
            'dimensions' => ['required'],
            'value' => ['required'],
            'type' => ['required'],
            'description' => ['required'],
        ]);
        $id->update($request->all());
        return redirect()->route('locals')->with('success','Local '.$request->code.' actualizado');
    }
    public function add($id)
    {
        return view('admin.locals.add');
    }
    public function save(Request $request,$id)
    {
        return $request;
    }
    public function destroy(Local $id)
    {
        $id->delete();
        return redirect()->route('locals')->with('success','Local '.$request->code.' eliminado');
    }
}
