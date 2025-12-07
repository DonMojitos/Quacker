<?php

namespace App\Http\Controllers;

use App\Models\Quack;
use Illuminate\Http\Request;

class QuacksController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $quacks = Quack::all();
        return view("quacks.index",[
            "quacks"=> $quacks
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
        Quack::create($request->all());
        return redirect("/quacks") ;
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        return view("quacks.show",[
           'quack' => Quack::find($id)->latest()
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        return view("quacks.edit",[
            'quack'=>Quack::find($id)
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $quack = Quack::find($id);
        $quack->update($request->all());
        return redirect('/quacks');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        Quack::destroy($id);
        return redirect("/quacks");
    }
}
