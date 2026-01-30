<?php

namespace App\Http\Controllers;

use App\Models\Quack;
use App\Models\Quashtag;
use Illuminate\Http\Request;

class QuashtagController extends Controller
{

    public function quacksByQuashtag(Quashtag $quashtag){
        return view("quashtags.quacks",[
            'quacks' => $quashtag->quacks()
            ->orderByDesc('created_at')
            ->get()
        ]);
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $quashtags = Quashtag::all();

        return view('quashtags.index', [
            'quashtags' => $quashtags
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('quashtags.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        Quashtag::create($request->all());
        return redirect('/quashtags');
    }

    /**
     * Display the specified resource.
     */
    public function show(Quashtag $quashtag)
    {
        return view('quashtags.show', [
            'quashtag' => $quashtag
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Quashtag $quashtag)
    {
        return view('quashtags.edit', [
            'quashtag' => $quashtag
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Quashtag $quashtag)
    {
        $quashtag->update($request->all());
        return redirect('/quashtags');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Quashtag $quashtag)
    {
        $quashtag->delete();
        return redirect('/quashtags');
    }
}
