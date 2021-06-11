<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use App\Http\Resources\User as UserResource;
use Illuminate\Support\Str;

class userController extends Controller
{
    public function __construct() {
        $this->middleware('auth');
        $this->middleware('verified');
    }
    public function index()
    {
        $users = User::where('status',1)->get();
        return view('admin.user.index',compact('users'));
    }
    public function store(Request $request)
    {
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users,email'],
            'password' => ['required', 'string', 'min:8'],
            'type' => ['required', 'string'],
        ]);
        $request['status'] = 1;
        $request['api_token'] = Str::random(15);
        User::create($request->all());
        return redirect()->route('users')->with('success','Se ha creado el usuario correctamente');
    }
    public function update(Request $request,User $id)
    {
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users,email,'.$id->id],
            'type' => ['required', 'string'],
        ]);
        $id->update($request->all());
        return redirect()->route('users')->with('success','Se ha actualizado el usuario correctamente');
    }
    public function destroid(User $id)
    {
        $id->delete();
        return redirect()->route('users')->with('success','Se ha eliminado el usuario correctamente');
    }

}
