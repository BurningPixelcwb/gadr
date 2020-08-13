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

        $parcelas = $request->parcela;
        $vlr_parcela = $request->valor_evento/$parcelas;
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
        
        // return redirect()->route('compras.index');
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

        $eventos = DB::table('eventos AS e')
        ->join('viagems AS v', 'v.id', '=', 'e.fk_id_viagem')
        ->join('pessoas AS p', 'p.id', '=', 'e.fk_responsavel_evento')
        ->join('evento_imagems AS i', 'i.fk_id_evento', '=', 'e.id')
        ->select(
            'e.id',
            'v.name as nome_evento',
            'e.desc_evento as descricao',
            'e.total_vagas_evento as total_vagas',
            'e.minimo_vagas_evento as min_vagas',
            DB::raw('DATE_FORMAT(e.data_ida_evento, "%d/%m/%Y") AS data_ida'),
            DB::raw('DATE_FORMAT(e.data_retorno_evento, "%d/%m/%Y") AS data_volta'),
            'e.valor_evento',
            'e.max_parcela',
            DB::raw('CONCAT(p.nome,  " ", p.sobrenome) as guia'),
            'i.path AS imagem'
            
        )
        ->where('e.id', '=',  $id_evento)
        ->orderBy('e.data_inscricao_close')
        ->get();

        $pessoas = DB::table('pessoas')
        ->select(
                     'id'
                   , 'nome'
                   , 'sobrenome'
                   , 'tipo_pessoa'
                )
        ->where('tipo_pessoa', '=', 1)
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
        $vendas = DB::table('parcelas AS p')
        ->join('compras as c', 'c.id', '=', 'p.fk_id_venda')
        ->join('eventos as e', 'e.id', '=', 'c.fk_id_evento')
        ->join('viagems as v', 'v.id', '=', 'e.fk_id_viagem')
        ->select(
            'p.id as id_parcela',
            'p.fk_id_venda as id_venda',
            'v.name',
            'e.id as id_evento'

        )
        ->whereMonth('p.dt_vencimento_parcela', '=',  $ldate = date('m'))
        ->groupBy('id_evento')
        ->get();
        
        return view('compras.list')->with(['vendas' => $vendas]);
    }
}
