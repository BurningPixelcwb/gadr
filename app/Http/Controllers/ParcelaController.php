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
            "SELECT
                    p.id
                , p.parcela_total
                , CASE
                    WHEN p.status = 'A' THEN 'Aberto'
                    WHEN p.status = 'AT' THEN 'Atrasado'
                    ELSE 'Fechado'
                    END AS status
                , DATE_FORMAT(p.dt_vencimento_parcela, '%d/%m/%Y') AS vencimento
                , p.vlr_parcela
                , CASE
                    WHEN forma_pagamento = 1 THEN 'Boleto'
                    WHEN forma_pagamento = 2 THEN 'Depósito'
                    ELSE 'C.Crédito'
                END AS frm_pagamento
                    
                , CONCAT( e.name, ' ', e.sobrenome) AS comprador
                
            FROM 
                parcelas p
                
            INNER JOIN
                compras c
                ON c.id = p.fk_id_venda
                
            INNER JOIN
                users e
                ON e.id = c.fk_id_pessoa
                
            INNER JOIN
                eventos AS v
                ON v.id = c.fk_id_evento
            
            AND
                MONTH(dt_vencimento_parcela) = MONTH(NOW())
                
            AND
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
