<?php

namespace App\Http\Controllers;

use App\Models\Local;
use App\User;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('verified');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $locals = Local::where('status',1)->count();
        $users = User::where('status',1)->count();
        return view('home',compact('locals','users'));
    }
}
