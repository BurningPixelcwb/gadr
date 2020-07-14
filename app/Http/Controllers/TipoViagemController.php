<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\TipoViagem;

class TipoViagemController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $tipos_viagem = TipoViagem::All();
        return view('tipo_viagem.index')->with(['tipos_viagem' => $tipos_viagem]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('tipo_viagem.create');
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
            'name' => 'required|string|max:255'
        ]);

        TipoViagem::create($request->all());
        return redirect()->route('tipo_viagem.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $tipo_viagem = TipoViagem::find($id);
        return view('tipo_viagem.show')->with(['tipo_viagem' => $tipo_viagem]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $tipo_viagem = TipoViagem::find($id);
        return view('tipo_viagem.edit')->with(['tipo_viagem' => $tipo_viagem]);
        
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required|string|max:255'
        ]);

        $tipos_viagem = TipoViagem::find($id)->update($request->all());
        return redirect()->route('tipo_viagem.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $tipos_viagem = TipoViagem::find($id)->delete();
        return redirect()->route('tipo_viagem.index');
    }
}
