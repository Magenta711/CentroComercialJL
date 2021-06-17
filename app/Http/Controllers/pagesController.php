<?php

namespace App\Http\Controllers;

use App\Models\Pages\Page;
use Illuminate\Http\Request;

class pagesController extends Controller
{
    public function index(){
        return view('pages.index');
    }
    public function about(){
        $id = Page::where('status',1)->first(['about']);
        return view('pages.about',compact('id'));
    }
    public function barbosa(){
        return view('pages.barbosa');
    }
    public function estate(){
        return view('pages.estate');
    }
    public function event_room(){
        return view('pages.event_room');
    }
    public function local(){
        return view('pages.local');
    }
    public function publicity_place(){
        return view('pages.publicity_place');
    }
}
