<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class localsController extends Controller
{
    public function __construct() {
        $this->middleware('auth');
        $this->middleware('verified');
    }
    public function index()
    {
        return view('admin.locals.index');
    }
    public function create()
    {
        return view('admin.locals.create');
    }
}
