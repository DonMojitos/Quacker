<?php

namespace App\Http\Controllers;

use App\Models\Quack;
use App\Models\Quashtag;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class QuackController extends Controller
{
    public function quavUnquav(Quack $quack)
    {
        if (Auth::user()->quacksQuaveados()->where('quack_id', $quack->id)->exists()) {
            Auth::user()->quacksQuaveados()->detach($quack->id);
        } else {
            Auth::user()->quacksQuaveados()->attach($quack->id);
        }

        return back();
    }

    public function requackUnrequack(Quack $quack)
    {
        if (Auth::user()->quacksRequackeados()->where('quack_id', $quack->id)->exists()) {
            Auth::user()->quacksRequackeados()->detach($quack->id);
        } else {
            Auth::user()->quacksRequackeados()->attach($quack->id);
        }

        return back();
    }

    public function feed()
    {
        $user = Auth::user();

        $idsBuscados = $user->siguiendo()->pluck('users.id');
        $idsBuscados->push($user->id);

        $quacks = Quack::with([
            'user',
            'quashtags',
            'usersRequacked',
            'usersQuaved',
        ])
            ->whereIn('user_id', $idsBuscados)
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
            ->whereIn('requacks.user_id', $idsBuscados)
            ->select(
                'quacks.*',
                'requacks.created_at as fecha_feed',
                'requacks.user_id as requack_user_id'
            )
            ->get()
            ->map(function ($quack) {
                $quack->tipo = 'requack';
                $quack->fecha_feed = $quack->getAttribute('fecha_feed');
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

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $quacks = Quack::all();

        return view('quacks.index', [
            'quacks' => $quacks->sortByDesc('created_at'),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('quacks.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $quack = new Quack;
        $quack->contenido = $request->contenido;
        $quack->user_id = Auth::id();
        $quack->save();

        // 1
        preg_match_all('/#(\w+)/u', $quack->contenido, $matches);
        $quashtagNames = array_unique($matches[1]);
        // 2
        $quashtags = [];
        foreach ($quashtagNames as $quashtagName) {
            $quashtags[] = Quashtag::firstOrCreate(['nombre' => $quashtagName]);
        }
        // 3
        if (! empty($quashtags)) {
            $quack->quashtags()->saveMany($quashtags);
        }

        return redirect('/feed');
    }

    /**
     * Display the specified resource.
     */
    public function show(Quack $quack)
    {
        return view('quacks.show', [
            'quack' => $quack,
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Quack $quack)
    {
        return view('quacks.edit', [
            'quack' => $quack,
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Quack $quack)
    {
        $quack->update($request->all());

        return redirect('/feed');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Quack $quack)
    {
        $quack->delete();

        return redirect('/feed');
    }
}
