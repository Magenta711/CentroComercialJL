<?php

namespace App\Http\Controllers;

use App\event_room;
use App\Models\Pages\Form;
use Illuminate\Http\Request;

class formsController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('verified');
        $this->middleware('permission:Lista de mensajes de formularios|Ver mensajes de formularios|Dar aprobación a mensajes de formularios|Eliminar mensajes de formularios', ['only' => ['index']]);
    }

    public function index()
    {
        $event_room = event_room::get();
        $forms = Form::orderBy('created_at', 'desc')->get();
        return view('admin.forms.index',compact('forms', 'event_room'));
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

    public function check(Form $id)
    {
        $id->update(['status'=>1]);
        return response()->json([ 'success'=>'Mensaje leido', 'data' => $id ]);
    }
    public function destroy(Form $id)
    {
        $id->delete();
        return response()->json([ 'success'=>'Mensaje eliminado' ]);
    }
}
