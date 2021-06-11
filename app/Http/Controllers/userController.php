<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use App\Http\Resources\User as UserResource;
use Illuminate\Support\Str;

class userController extends Controller
{

    public function index()
    {
        return view('admin.user.index');
    }

    public function list(Request $request)
    {
        return response()->json(['success'=>'Good']);
    }
    public function store(Request $request)
    {
        return new UserResource(User::find(1));
    }

    public function columns()
    {
        return response()->json([
            [
                'name' => "id",
                'title' => "ID",
                'breakpoints' => "xs sm",
                'type' => "number",
                'style' => [
                    'width' => 80,
                    'maxWidth' => 80,
                ],
            ],
            [
                'name' => "name",
                'title' => "Nombre",
            ],
            [
                'name' => "email",
                'title' => "Correo",
            ],
            [
                'name' => "status",
                'title' => "Estado",
            ],
            [
                'name' => "created_at",
                'title' => "Fecha",
            ],
        ]);
    }
}
