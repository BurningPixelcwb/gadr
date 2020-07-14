<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\SubTipo;
use App\Models\TipoViagem;
use Illuminate\Support\Facades\DB;


class SubTipoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $subtipos = DB::table('sub_tipos as st')
        ->join('tipo_viagems as tv', 'tv.id', '=', 'st.fk_id_tipo_viagem')
        ->select(
              'st.id as id'
            , 'st.name'
            , 'tv.id as fk_tv'
            , 'tv.name as tv_nome'
            , 'st.created_at'
            )
        ->get();
        
        return view('subtipos.index')->with(['subtipos' => $subtipos]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $tipo_viagens = TipoViagem::All();
        return view('subtipos.create')->with(['tipo_viagens' => $tipo_viagens]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        SubTipo::create($request->all());
        return redirect()->route('subtipos.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $sub_tipo = SubTipo::find($id);
        $tipo_viagens = TipoViagem::All();
        return view('subtipos.edit')->with(['sub_tipo' => $sub_tipo,'tipo_viagens' => $tipo_viagens]);
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
        $sub_tipo = SubTipo::find($id)->update($request->all());
        return redirect()->route('sub_tipo.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $sub_tipo = SubTipo::find($id)->delete();
        return redirect()->route('sub_tipo.index');
    }
}
