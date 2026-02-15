<?php

namespace App\Http\Controllers;

use App\Http\Requests\PartidaStoreRequest;
use App\Models\Partida;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PartidaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('campanha_dificuldade');
    }

    public function modos(){
        return view('modos_jogo');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(PartidaStoreRequest $request)
    {
        $partida = Partida::create(array_merge(
            $request->validated(),
            [
                'started_at' => now(),
                'criado_por' => Auth::id(),
            ]
        ));
        dd($partida);
    }

    /**
     * Display the specified resource.
     */
    public function show(Partida $partida)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Partida $partida)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Partida $partida)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Partida $partida)
    {
        //
    }
}
