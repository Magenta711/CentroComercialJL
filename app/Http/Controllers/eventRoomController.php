<?php

namespace App\Http\Controllers;

use App\EventRoom;
use App\event_room;
use Carbon\Carbon;
use Illuminate\Http\Request;

class eventRoomController extends Controller
{
    public function __construct() {
        $this->middleware('auth');
        $this->middleware('verified');
        $this->middleware('permission:Lista de administración de eventos del salon|Crear eventos del salon|Ver eventos del salon|Editar eventos del salon|Eliminar eventos del salon', ['only' => ['index']]);
    }
    public function index(Request $request)
    {
        if ($request->ajax()) {
            $data = EventRoom::whereDate('start', '>=', $request->start)->whereDate('end',   '<=', $request->end)->get(['id', 'title', 'start', 'end']);
            return response()->json($data);
        }

        $events = event_room::get();

        return view('admin.event_room.index', compact('events'));
    }

    public function store(Request $request)
    {
        // return $request;
        $event = event_room::create([
            'name'=>$request->namereserva,
            'email'=>$request->emailreserva,
            'telefono'=>$request->telefonoreserva,
            'date_reserva'=>$request->fechareserva,
            'description'=>$request->descripcionreserva,
        ]);
        return view('pages.event_room')->with('success',"Rerva creada, nos comunicaremos contigo");
    }

    public function update(Request $request,EventRoom $id)
    {
        $id->update($request->all());
        return response()->json( $id );
    }

    public function destroy(EventRoom $id)
    {
        $id->delete();
        return response()->json( ['succes' => 'Se el elimino el evento ' .$id->id ]);
    }
}
