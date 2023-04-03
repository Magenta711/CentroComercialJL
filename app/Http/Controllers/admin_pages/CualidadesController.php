<?php

namespace App\Http\Controllers\admin_pages;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Pages\Page;

class CualidadesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

     public function __construct() {
        $this->middleware('auth');
        $this->middleware('verified');
        $this->middleware('permission:Ver administración pagina nosotros|Editar contenido de pagina nosotros', ['only' => ['index']]);
        $this->middleware('permission:Editar contenido de pagina nosotros', ['only' => ['store']]);
    }

    public function index()
    {
        $id = Page::where('status',3)->first(['about']);
        return view('admin.pages.cualidades.index',compact('id'));
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
        $information = Page::where('status', 3)->first();
        if($information) {
            $request->validate([
                'text' => ['required'],
            ]);
            $information -> update([
                'about' => $request->text,
            ]);
        }
        if (!$information){
            $request->validate([
                'text' => ['required'],
            ]);
            $information = Page::create([
                'about' => $request->text,
                'status' => 3
            ]);
        }
        return redirect()->route('admin_cualidades')->with('success','Cambios guardados');
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
    public function update(Request $request, $id)
    {
        //
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
