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
    public function store(Request $request)
    {
        return $request;
    }
    public function edit($id)
    {
        return view('admin.locals.edit');
    }
    public function update(Request $request,$id)
    {
        return $request;
    }
    public function add($id)
    {
        return view('admin.locals.add');
    }
    public function save(Request $request,$id)
    {
        return $request;
    }
    public function destroy($id)
    {
        
    }
}
