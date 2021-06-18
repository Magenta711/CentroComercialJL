<?php

namespace App\Http\Controllers;

use App\Models\Publicity;
use App\Models\PublicityDetail;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class publicityPlaceController extends Controller
{
    public function __construct() {
        $this->middleware('auth');
        $this->middleware('verified');
    }
    public function index()
    {
        $publicities = Publicity::get();
        return view('admin.publicity.index',compact('publicities'));
    }
    public function create()
    {
        return view('admin.publicity.create');
    }
    public function store(Request $request)
    {
        $request->validate([
            'ubications' => ['required'],
            'title' => ['required'],
            'value' => ['required'],
            'file' => ['required'],
            'description' => ['required'],
        ]);

        if ($request->hasFile('file')){
            $file = $request->file('file');
            $name = time().'.'.$file->getClientOriginalExtension();
            Storage::putFileAs('public/avatar/publicity_place/', $file, $name);
            $request['avatar'] = $name;
        }else {
            $request['avatar'] = 'logo-default.png';
        }
        $id = Publicity::create($request->all());
        if ($request->hasFile('file')) {
            $file = new filesController();
            $file->upload($request,$id->id,3);
        }
        return redirect()->route('publicity_place')->with('success','Espacio publicitario '.$request->title.' creado');
    }
    public function show(Publicity $id)
    {
        return view('admin.publicity.show',compact('id'));
    }
    public function edit(Publicity $id)
    {
        return view('admin.publicity.edit',compact('id'));
    }
    public function update(Request $request,Publicity $id)
    {
        $request->validate([
            'ubications' => ['required'],
            'title' => ['required'],
            'value' => ['required'],
            'description' => ['required'],
        ]);
        if ($request->hasFile('file')){
            $file = $request->file('file');
            $name = time().'.'.$file->getClientOriginalExtension();
            Storage::putFileAs('public/avatar/publicity_place/', $file, $name);
            $request['avatar'] = $name;
        }
        $id->update($request->all());
        return redirect()->route('publicity_place')->with('success','Espacio publicitario '.$request->title.' actualizado');
    }
    public function add(Publicity $id)
    {
        $users = User::where('status',1)->get();
        return view('admin.publicity.add',compact('id','users'));
    }
    public function save(Request $request,Publicity $id)
    {
        $request->validate([
            'user_id' => ['required'],
            'description' => ['required'],
        ]);
        $request['publicity_id'] = $id->id;
        PublicityDetail::create($request->all());
        return redirect()->route('publicity_place')->with('success','Espacio publicitario '.$id->title.' rentado');
    }
    public function destroy(Publicity $id)
    {
        $id->delete();
        return response()->json([ 'success'=>'Espacio publicitario eliminado' ]);
    }
}
