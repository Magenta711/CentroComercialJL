<?php

namespace App\Http\Controllers;

use App\Models\Rent;
use App\SocialMediaRents;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class myLoclasController extends Controller
{
    public function __construct() {
        $this->middleware('auth');
        $this->middleware('verified');
        $this->middleware('permission:Lista de mis locales|Ver mis locales|Editar mis locales', ['only' => ['index']]);
        $this->middleware('permission:Ver mis locales', ['only' => ['show']]);
        $this->middleware('permission:Editar mis locales', ['only' => ['edit','update']]);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $locals = Rent::where('user_id',auth()->id())->where('status',1)->get();
        return view('my.local.index',compact('locals'));
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
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Rent $id)
    {
        if(!$this->my_local_validate($id)){
            return redirect('home')->with('success','No tienes acceso a esta página.');
        }
        return view('my.local.show',compact('id'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(rent $id)
    {
        return view('my.local.edit',compact('id'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,Rent $id)
    {
        if(!$this->my_local_validate($id)){
            return redirect('home')->with('success','No tienes acceso a esta página.');
        }
        if ($request->hasFile('file')){
            $file = $request->file('file');
            $name = time().'.'.$file->getClientOriginalExtension();
            Storage::putFileAs('public/avatar/locals/', $file, $name);
            $request['avatar'] = $name;
        }
        $id->update($request->all());
        SocialMediaRents::where('rent_id',$id->id)->delete();
        foreach ($request->link_social_media as $key => $value) {
            SocialMediaRents::create([
                'rent_id' => $id->id,
                'link' => $request->link_social_media[$key],
                'type' => $request->type_social_media[$key]
            ]);
        }
        return redirect()->route('my.local')->with('success','Mi local fue editado y publicado');
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

    public function my_local_validate($rent)
    {
        if (auth()->id() == $rent->user_id) {
            return true;
        }
        return false;
    }
}
