<?php

namespace App\Http\Controllers;

use App\Role;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class RolesController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('role:admin')->except(['index']);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $roles = Role::all();

        return view('admin.roles.index', compact('roles'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // dd($request->toArray());
        $this->validate($request, [
            'name' => 'required|unique:roles',
            'display_name' => 'required',
            'description' => 'required'
        ]);

        $role = Role::create($request->all());

        return redirect()->route('admin.roles.index')->withFlash('El rol '.$role->display_name.' ha sido creado');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Role $role)
    {
        return view('admin.roles.edit', compact('role'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Role $role)
    {
        $rules = [
            'name' => [
                'required',
                Rule::unique('roles')->ignore($role->id)
            ],
            'display_name' => 'required',
            'description' => 'required'
        ];

        $data = $request->validate($rules);

        $role->update($data);

        return redirect()->route('admin.roles.index')->withFlash('El rol '.$role->display_name.' ha sido actualizado');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Role $role)
    {
        //Si es el rol admin, se retorna una exception
        if ($role->name === 'admin') {
            return back()->withError('El rol '.$role->name.' no puede ser eliminado');
        }

        //se eliminan las relaciones de usuarios
        $role->users()->detach();

        $role->delete();

        return redirect()->route('admin.roles.index')->withFlash('Rol eliminado');
    }
}
