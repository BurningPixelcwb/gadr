<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Parcela;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class ParcelaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $parcelas = DB::select(
            "select
                p.id
                , p.parcela_total
                , CASE
                    WHEN p.status = 'A' THEN 'Aberto'
                    ELSE 'Fechado'
                  END AS status
                , p.dt_vencimento_parcela
                , p.vlr_parcela
                , CASE
                    WHEN forma_pagamento = 1 THEN 'Boleto'
                    WHEN forma_pagamento = 2 THEN 'Depósito'
                    ELSE 'Cartão de crédito'
                end as frm_pagamento
                    
                , concat( e.nome, ' ', e.sobrenome) as comprador
                
            from 
                parcelas p
                
                
            inner join 
                compras c
                on c.id = p.fk_id_venda
                
            inner join
                pessoas e
                on e.id = c.fk_id_pessoa
                
            inner join
                eventos as v
                on v.id = c.fk_id_evento
                
                
            where
                status = 'A'
                
            and	
                month(dt_vencimento_parcela) = month(now())
                
            and
                v.id = " . $id
        );

        return view('parcelas.list')->with(['parcelas' => $parcelas]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    public function details($id){
        dd('oi => ' . $id);
    }
}
