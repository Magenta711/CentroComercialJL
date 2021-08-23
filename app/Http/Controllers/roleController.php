<?php

namespace App\Http\Controllers;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use Illuminate\Http\Request;

class roleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $roles = Role::get();
        $permissions =Permission::get();
        return view('admin.user.role.index',compact('roles','permissions'));
    }
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|unique:roles,name',
            'permission' => 'required',
        ]);
        $role = Role::create(['name' => $request->input('name')]);
        $role->syncPermissions($request->input('permission'));
        return redirect()->route('roles')
            ->with('success','El rol ha sido creado correctamente');
    }
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Role $id)
    {
        $request->validate([
            'name' => 'required|unique:roles,name,'.$id->id,
            'permission' => 'required',
        ]);
        $id->update(['name' => $request->name]);
        $id->syncPermissions($request->input('permission'));
        return redirect()->route('roles')
            ->with('success','El rol ha sido actualizado correctamente');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Role $id)
    {
        $id->delete();
        return redirect()->route('roles')
            ->with('success','El rol ha eliminado correctamente');
    }
}
