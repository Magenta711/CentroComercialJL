<?php

namespace App\Http\Controllers;

use App\Models\Rent;
use App\SocialMediaRents;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class rentsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $rents = Rent::where('status',1)->get();
        return view('admin.rent.index',compact('rents'));
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
        return view('admin.rent.show',compact('id'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Rent $id)
    {
        return view('admin.rent.edit',compact('id'));
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
        return redirect()->route('admin_rents')->with('success','La renta fue editado');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Rent $id)
    {
        return response()->json([ 'success'=>'Local eliminado']);
        $id->delete();
        return redirect()->route('admin_rents')->with('success','La renta fue eliminada');
    }

    public function sudadd(Rent $id)
    {
        $id->update([
            'status' => 0,
        ]);
        return redirect()->route('admin_rents')->with('success','El la renta fue terminada');
    }
}
