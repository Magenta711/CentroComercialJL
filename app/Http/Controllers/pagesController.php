<?php

namespace App\Http\Controllers;

use App\Models\Local;
use App\Models\Pages\Page;
use App\Models\Pages\Slider;
use App\Models\Publicity;
use App\Models\Rent;
use Illuminate\Http\Request;

class pagesController extends Controller
{
    public function index(){
        $sliders = Slider::get();
        $estates = Rent::where('status',1)->where('is_page',1)->get();
        return view('pages.index',compact('sliders','estates'));
    }
    public function about(){
        $id = Page::where('status',1)->first(['about']);
        return view('pages.about',compact('id'));
    }
    public function barbosa(){
        return view('pages.barbosa');
    }
    public function estate(){
        $estates = Rent::where('status',1)->where('is_page',1)->get();
        return view('pages.estate',compact('estates'));
    }
    public function event_room(){
        return view('pages.event_room');
    }
    public function local(){
        $locals = Local::where('status',1)->get();
        return view('pages.local',compact('locals'));
    }
    public function publicity_place(){
        $publicities = Publicity::get();
        return view('pages.publicity_place',compact('publicities'));
    }
    public function estate_show(Rent $id)
    {
        if ($id->status == 1 && $id->is_page == 1) {
            return view('pages.estates',compact('id'));
        }
        return redirect()->route('estate');
    }
}
