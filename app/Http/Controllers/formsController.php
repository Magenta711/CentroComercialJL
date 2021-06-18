<?php

namespace App\Http\Controllers;

use App\Models\Pages\Form;
use Illuminate\Http\Request;

class formsController extends Controller
{
    public function __construct()
    {
        // $this->middleware('auth');
        // $this->middleware('verified');
    }

    public function index()
    {
        $forms = Form::get();
        return view('admin.forms.index',compact('forms'));
    }
    public function store(Request $request)
    {
        Form::create([
            'name' => $request->name,
            'email' => $request->email,
            'tel' => $request->tel,
            'type' => 'Contáctanos',
            'data' => '{"afair" : "'.$request->afair.'", "message" : "'.$request->message.'"}',
        ]);
        return redirect()->back()->with('success',"Enviado");
    }
}