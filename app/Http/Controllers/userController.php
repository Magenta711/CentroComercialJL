<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;

class userController extends Controller
{
    public function __construct() {
        $this->middleware('auth');
        $this->middleware('verified');
    }

    public function index()
    {
        return view('admin.user.index');
    }

    public function column()
    {
        return response()->json(
            [
                "name"=> "id",
                "title"=> "ID",
                "breakpoints"=> "xs sm",
                "type"=> "number",
                "style"=> [
                "width"=> 80,
                "maxWidth"=> 80
            ]
            ],
            [
                "name"=> "firstName",
                "title"=> "First Name"
            ],
            [
                "name"=> "lastName",
                "title"=> "Last Name"
            ],
            [
                "name"=> "something",
                "title"=> "Never seen but always around",
                "visible"=> false,
                "filterable"=> false
            ],
            [
                "name"=> "jobTitle",
                "title"=> "Job Title",
                "breakpoints"=> "xs sm",
                "style"=> [
                    "maxWidth"=> 200,
                    "overflow"=> "hidden",
                    "textOverflow"=> "ellipsis",
                    "wordBreak"=> "keep-all",
                    "whiteSpace"=> "nowrap"
                ]
            ],
            [
                "name"=> "started",
                "title"=> "Started On",
                "type"=> "date",
                "breakpoints"=> "xs sm md",
                "formatString"=> "MMM YYYY"
            ],
            [
                "name"=> "dob",
                "title"=> "Date of Birth",
                "type"=> "date",
                "breakpoints"=> "xs sm md",
                "formatString"=> "DD MMM YYYY"
            ],
            [
                "name"=> "status",
                "title"=> "Status"
            ]
        );
    }
}
