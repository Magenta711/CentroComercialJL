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
        $sliders = Slider::where('startdate','<',now())->get();
        $estates = Rent::where('status',1)->where('is_page',1)->get();
        return view('pages.index',compact('sliders','estates'));
    }
    public function about(){
        $id = Page::where('status',1)->first(['about']);
        return view('pages.about',compact('id'));
    }
    public function barbosa(){
        $id = Page::where('status',2)->first(['about']);
        return view('pages.barbosa', compact('id'));
    }
    public function estate(){
        $estates = Rent::where('status',1)->get();
        // return $estates;
        return view('pages.estate',compact('estates'));
    }
    public function event_room(){
        return view('pages.event_room');
    }
    public function local(){
        $locals = Local::where('status',1)->where('publish',1)->get();
        return view('pages.local',compact('locals'));
    }
    public function local_show(Local $id){
        return view('pages.local_show',compact('id'));
    }
    public function publicity_place(){
        $publicities = Publicity::get();
        return view('pages.publicity_place',compact('publicities'));
    }
    public function estate_show(Rent $id)
    {
        if ($id->status == 1) {
            return view('pages.estates',compact('id'));
        }
        // && $id->is_page == 1
        return redirect()->route('estate');
    }
}
