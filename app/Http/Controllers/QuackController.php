<?php

namespace App\Http\Controllers;

use App\Models\Quack;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;

class QuackController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $quacks = Quack::all();
        return view("quacks.index",[
            "quacks"=> $quacks->sortByDesc('created_at')
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view("quacks.create");
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //Quack::create($request->all()); este no pasa el user_id
        // Quack::make([
        //     'contenido' => $request->contenido,
        //     'user_id' => Auth::id()
        // ]); Aqui si q pasa el user_id pero se supone q es más inseguro por tener q aviltiarlo en el model como $fillable
        $quack = new Quack();
        $quack->contenido = $request->contenido;
        $quack->user_id = Auth::id();
        $quack->save();

        return redirect("/quacks") ;
    }

    /**
     * Display the specified resource.
     */
    public function show(Quack $quack)
    {
        return view("quacks.show",[
           'quack' =>$quack
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Quack $quack)
    {
        Gate::authorize('edit', $quack);

        return view("quacks.edit",[
            'quack'=>$quack
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Quack $quack)
    {
        $quack->update($request->all());
        return redirect('/quacks');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Quack $quack)
    {
        $quack->delete();
        return redirect("/quacks");
    }
}
