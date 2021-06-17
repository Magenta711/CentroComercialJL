<?php

namespace App\Http\Controllers;

use App\Models\Local;
use App\Models\Rent;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

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
    public function show(Local $id)
    {
        return view('admin.locals.show',compact('id'));
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
    public function add(Local $id)
    {
        $users = User::where('status',1)->get();
        return view('admin.locals.add',compact('id','users'));
    }
    public function save(Request $request,Local $id)
    {
        $request->validate([
            'user_id' => ['required'],
            'brand' => ['required'],
            'description' => ['required'],
        ]);
        if ($request->hasFile('file')){
            $file = $request->file('file');
            $name = time().'.'.$file->getClientOriginalExtension();
            Storage::putFileAs('public/avatar/locals/', $file, $name);
            $request['avatar'] = $name;
        }else {
            $request['avatar'] = 'logo-default.png';
        }
        $request['local_id'] = $id->id;
        Rent::create($request->all());
        $id->update([ 
            'status' => 0
         ]);
        return redirect()->route('locals')->with('success','Local '.$id->code.' rentado');
    }
    public function destroy(Local $id)
    {
        $id->delete();
        return redirect()->route('locals')->with('success','Local '.$id->code.' eliminado');
    }
}
