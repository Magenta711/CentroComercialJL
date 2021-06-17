<?php

namespace App\Http\Controllers\admin_pages;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Pages\Page;

class aboutController extends Controller
{
    public function __construct() {
        $this->middleware('auth');
        $this->middleware('verified');
    }

    public function index()
    {
        $id = Page::where('status',1)->first(['about']);
        return view('admin.pages.about.index',compact('id'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'text' => ['required'],
        ]);
        Page::where('status',1)->update([
            'about' => $request->text,
        ]);
        return redirect()->route('admin_about')->with('success','Cambios guardados');
    }
}
