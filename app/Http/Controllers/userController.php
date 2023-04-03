<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class userController extends Controller
{
    public function __construct() {
        $this->middleware('auth');
        $this->middleware('verified');
        $this->middleware('permission:Lista de usuarios|Crear usuarios|Editar usuarios|Eliminar usuarios', ['only' => ['index']]);
        $this->middleware('permission:Crear usuarios', ['only' => ['store']]);
        $this->middleware('permission:Editar usuarios', ['only' => ['update']]);
        $this->middleware('permission:Eliminar usuarios', ['only' => ['destroy']]);
    }
    public function index()
    {
        $users = User::where('status',1)->get();
        $roles = Role::get();
        return view('admin.user.index',compact('users','roles'));
    }
    public function store(Request $request)
    {
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users,email'],
            'password' => ['required', 'string', 'min:8'],
            'roles' => ['required'],
        ]);
        $request['status'] = 1;
        $request['api_token'] = Str::random(15);
        $request['password'] = Hash::make($request->password);
        $user = User::create($request->all());
        $user->assignRole($request->roles);
        return redirect()->route('users')->with('success','Se ha creado el usuario');
    }
    public function update(Request $request,User $id)
    {
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users,email,'.$id->id],
            'roles' => ['required'],
        ]);
        $id->update($request->all());
        $id->syncRoles($request->roles);
        return redirect()->route('users')->with('success','Se ha actualizado el usuario');
    }
    public function destroy(User $id)
    {
        $id->update(['status'=>0]);
        return redirect()->route('users')->with('success','Se ha eliminado el usuario');
    }

}
