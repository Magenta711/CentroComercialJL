<?php

namespace App\Http\Controllers\admin_pages;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class aboutController extends Controller
{
    public function __construct() {
        $this->middleware('auth');
        $this->middleware('verified');
    }

    public function index()
    {
        return view('admin.pages.about.index');
    }

    public function store(Request $request)
    {
        return redirect('admin_about').with('success','Cambios guardados');
    }
}
