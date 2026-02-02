<?php

namespace App\Http\Controllers;

use App\Models\Quack;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    public function followUnfollow(Request $request, User $user){
        if($request->has('follow')){
            $user->seguidores()->attach(Auth::user()->id);
        }else{
            $user->seguidores()->detach(Auth::user()->id);
        }
        return redirect('/users/'. $user->id);
    }

    public function quacksUsuario(User $user)
    {
        $quacks = Quack::with([
            'user',
            'quashtags',
            'usersRequacked',
            'usersQuaved',
        ])
            ->where('user_id', $user->id)
            ->get()
            ->map(function ($quack) {
                $quack->tipo = 'quack';
                $quack->fecha_feed = $quack->created_at;

                return $quack;
            });

        $requacks = Quack::with([
            'user',
            'quashtags',
            'usersRequacked',
            'usersQuaved',
        ])
            ->join('requacks', 'quacks.id', '=', 'requacks.quack_id')
            ->where('requacks.user_id', $user->id)
            ->select(
                'quacks.*',
                'requacks.created_at as fecha_feed',
                'requacks.user_id as requack_user_id'
            )
            ->get()
            ->map(function ($quack) {
                $quack->tipo = 'requack';
                $quack->fecha_feed = $quack->fecha_feed;
                return $quack;
            });
        
        $feed = $quacks
            ->merge($requacks)
            ->sortByDesc('fecha_feed')
            ->values();

        return view('quacks.index', [
            'feed' => $feed
        ]);
     }
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
        return redirect('/login');
    }

    // ver uno solo
    public function show(User $user)
    {
        
        // $popu = 0;
        // foreach ($user->quacks as $quack) {
        //     $popu += $quack->usersQuaved->count();
        // }
        $popularidad = $user->quacks->sum(function($quack){/*lo dejo de esta forma pq es más mejor,
                                                           más optimo y laravel lo entiende de super puta madre*/
            return $quack->usersQuaved->count();
        });
        $suma = 0;
        foreach ($user->quacks as $quack) {//así es 'como me sale'
            $suma += $quack->usersRequacked->count();
        }
        return view('users.show', [
            'user' => $user,
            'popularidad' => $popularidad,
            'viralidad' => $suma
            ]);
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
        return redirect('/users/' . Auth::user()->id);
    }

    // eliminar
    public function destroy(User $user)
    {
        $user->delete();
        return redirect('/users');
    }
}