<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class eventRoomController extends Controller
{
    public function __construct() {
        $this->middleware('auth');
        $this->middleware('verified');
    }
    public function index()
    {
        $events = [];
        $categories = [];
        return view('admin.event_room.index',compact('events','categories'));
    }
}
