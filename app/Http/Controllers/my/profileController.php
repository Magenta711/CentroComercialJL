<?php

namespace App\Http\Controllers\my;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;

class profileController extends Controller
{
    public function __construct() {
        $this->middleware('auth');
        $this->middleware('verified');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('my.profile.index');
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
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        auth()->user()->update([
            'address' => $request->address ?? auth()->user()->address,
            'tel' => $request->tel ?? auth()->user()->tel,
            'name' => $request->name ?? auth()->user()->name,
            'email' => $request->email ?? auth()->user()->email,
        ]);

        if ($request->hasFile('avatar')){
            $file = $request->file('avatar');
            $name = time().str_random().'.'.$file->getClientOriginalExtension();
            Storage::putFileAs('public/avatar/users/', $file, $name);
            auth()->user()->update(['avatar'=>$name]);
        }
        if ($request->current_password && $request->password) {
            $request->validate([
                'current_password' => ['required','string'],
                'password' => ['required', 'string', 'min:8','confirmed'],
            ]);
            if (Hash::check($request->current_password,auth()->user()->password)) {
                auth()->user()->update([
                    'password'=>bcrypt($request->password),
                ]);
            }else {
                return redirect()->back()->withErrors(['current_password' => 'Contraseña incorrecta'])->withInput();
            }
        }
        return redirect()->back()->with('success','Perfil actualizado');
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
}
