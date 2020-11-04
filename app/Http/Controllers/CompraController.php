<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Evento;
use App\Models\Compra;
use App\Models\Parcela;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class CompraController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $eventos = DB::table('eventos AS e')
        ->join('viagems AS v', 'v.id', '=', 'e.fk_id_viagem')
        ->join('evento_imagems AS i', 'i.fk_id_evento', '=', 'e.id')
        ->select(
            'e.id',
            'v.name as nome',
            'e.desc_evento as descricao',
            DB::raw('DATE_FORMAT(e.data_inscricao_close, "%d/%m/%Y") AS fechamento'),
            'i.path AS imagem'
            
        )
        ->where('e.data_inscricao_close', '>=',  DATE('Y-m-d'))
        ->orderBy('e.data_inscricao_close')
        ->get();
        
        return view('compras.index')->with(['eventos' => $eventos]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = request()->validate([
            'fk_id_pessoa'          => 'required|min:1',
            'forma_pagamento'       => 'required|min:1',
            'dt_vencimento_parcela' => 'required|min:1'
            
        ]);

        $valor_evento = str_replace(',', '.', $request->valor_evento);

        $parcelas = $request->parcela;

        $vlr_parcela = $valor_evento/$parcelas;
        $status = 'A';
        $dt_vencimento = date('Y-m-d', strtotime(str_replace('/', '-', $request->dt_vencimento_parcela)));

        $venda = Compra::create($request->all());

        for ($i = 1; $i <= $parcelas; $i++) {
            $day = ($i-1)*30;
            $dt_vencimento_parcela = date('Y-m-d',  strtotime($dt_vencimento . '+ ' . $day . 'day'));

            $info_parcela = array(
                'fk_id_venda' => $venda->id, 
                'parcela_total' => $i . '/' . $parcelas, 
                'status' => $status, 
                'dt_vencimento_parcela' => $dt_vencimento_parcela, 
                'dt_alteracao' => null, 
                'vlr_parcela' => $vlr_parcela
            
            );
            Parcela::create($info_parcela);
        }
        
        return redirect()->route('compras.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id_evento)
    {
        $user = Auth::user();

        $query = 'SELECT 
                e.id
            , v.name 											AS nome_evento
            , e.desc_evento 									AS descricao
            , e.total_vagas_evento 								AS total_vagas
            , e.minimo_vagas_evento 							AS min_vagas
            , DATE_FORMAT(e.data_ida_evento, "%d/%m/%Y") 		AS data_ida
            , DATE_FORMAT(e.data_retorno_evento, "%d/%m/%Y") 	AS data_volta
            , REPLACE(e.valor_evento, ".", ",")					AS valor_evento
            , e.max_parcela 
            , CONCAT(p.nome, " ", p.sobrenome) 				    AS guia
            , (e.total_vagas_evento - (SELECT count(*) FROM compras WHERE fk_id_evento = ' . $id_evento . ')) AS vagas_restantes

        FROM eventos AS e

        INNER JOIN 
            viagems AS v 
            ON v.id = e.fk_id_viagem
        INNER JOIN
            pessoas AS p 
            ON p.id = e.fk_responsavel_evento
            
        INNER JOIN 
            evento_imagems AS i
            ON i.fk_id_evento = e.id
            
        WHERE
            e.id = ' . $id_evento;

        $eventos = DB::select($query);

        $pessoas = DB::table('users')
        ->select(
                     'id'
                   , 'name'
                   , 'sobrenome'
                )
        
        ->get();

        return view('compras.create')->with(['eventos' => $eventos, 'pessoas' => $pessoas, 'user' => $user]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $compras = Compra::find($id);
        return view('compras.edit')->with(['compras' => $compras]);
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



    public function list()
    {
        $vendas = DB::select("SELECT 
        viagem
      , id_evento
      , COUNT(*) 		AS total_parcelas
      , SUM(aberto) 	AS aberto
      , SUM(fechado)	AS fechado
      , SUM(atraso) 	AS atraso
  FROM (
          SELECT
                G.name AS viagem
              , P.id AS id_parcela
              , V.id AS id_venda
              , E.id AS id_evento
              , CASE WHEN status = 'A' 	AND dt_vencimento_parcela >= NOW() THEN 1 ELSE 0 END AS aberto
              , CASE WHEN status = 'F' 	THEN 1 ELSE 0 END AS fechado
              , CASE WHEN status = 'AT' THEN 1 ELSE 0 END AS atraso
              
          FROM 
              compras AS V
              
          INNER JOIN
              parcelas AS P
              ON p.fk_id_venda = V.id
              
          INNER JOIN
              eventos AS E
              ON e.id = v.fk_id_evento
  
          INNER JOIN 
              viagems AS G
              ON G.id = e.fk_id_viagem
      ) AS tp
  GROUP BY viagem");
        return view('compras.list')->with(['vendas' => $vendas]);
    }
}
