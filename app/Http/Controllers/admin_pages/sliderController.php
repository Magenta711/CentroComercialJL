<?php

namespace App\Http\Controllers\admin_pages;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class sliderController extends Controller
{
    public function __construct() {
        $this->middleware('auth');
        $this->middleware('verified');
    }
    public function index()
    {
        return view('admin.pages.slider.index');
    }
    public function create()
    {
        return view('admin.pages.slider.create');
    }
    public function store(Request $request)
    {
        return redirect('admin_slider').with('success','Cambios guardados');
    }
    public function edit($id)
    {
        return view('admin.pages.slider.edit');
    }
}
