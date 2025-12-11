<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    // mostrar lista
    public function index()
    {
        $users = User::all();
        return view('users.index', ['users' => $users]);
    }

    // formulario crear
    public function create()
    {
        return view('users.create');
    }

    // guardar en BBDD
    public function store(Request $request)
    {
        User::create($request->all());
        return redirect('/users');
    }

    // ver uno solo
    public function show(User $user)
    {
        return view('users.show', ['user' => $user]);
    }

    // formulario editar
    public function edit(User $user)
    {
        return view('users.edit', ['user' => $user]);
    }

    // actualizar en BBDD
    public function update(Request $request, User $user)
    {
        $user->update($request->all());
        return redirect('/users');
    }

    // eliminar
    public function destroy(User $user)
    {
        $user->delete();
        return redirect('/users');
    }
}