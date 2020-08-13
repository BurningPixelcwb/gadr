<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Evento;
use App\Models\EventoImagem;
use App\Models\Viagem;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class EventoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */


    public function index(){
        if(Auth::check() === true){
            $eventos = DB::table('eventos AS e')
            ->join('viagems AS v', 'v.id', '=', 'e.fk_id_viagem')
            ->join('pessoas AS p', 'p.id', '=', 'e.fk_responsavel_evento')
            ->select(
                    'e.desc_evento AS descricao',
                    'v.name AS nome_viagem',
                    'e.id AS id_evento',
                    'e.data_inscricao_open AS abertura',
                    'e.data_inscricao_close AS fechamento',
                    DB::raw('DATE_FORMAT(data_inscricao_open, "%d/%m/%Y")    AS abertura'),
                    DB::raw('DATE_FORMAT(data_inscricao_close, "%d/%m/%Y")   AS fechamento'),
                    DB::raw('DATE_FORMAT(data_ida_evento, "%d/%m/%Y")        AS ida'),
                    DB::raw('CONCAT(p.nome,  " ", p.sobrenome)               AS guia'),
                    'e.valor_evento AS valor'
                    )
            ->where('p.tipo_pessoa', '=', 2)
            ->get();
            return view('eventos.index')->with(['eventos' => $eventos]);
        }
        
        return redirect()->route('adm.login');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $pessoas = DB::table('pessoas')
        ->select(
                     'id'
                   , 'nome'
                   , 'sobrenome'
                   , 'tipo_pessoa'
                )
        ->where('tipo_pessoa', '=', 2)
        ->get();

        $viagens = Viagem::All();
        return view('eventos.create')->with(['viagens' => $viagens, 'pessoas' => $pessoas]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $evento = new Evento();
        $evento->fk_id_viagem = $request->fk_id_viagem;
        $evento->fk_responsavel_evento = $request->fk_responsavel_evento;
        $evento->desc_evento = $request->desc_evento;
        $evento->local_ida_evento = $request->local_ida_evento;
        $evento->data_ida_evento = $request->data_ida_evento;
        $evento->hora_ida_evento = $request->hora_ida_evento;
        $evento->local_retorno_evento = $request->local_retorno_evento;
        $evento->data_retorno_evento = $request->data_retorno_evento;
        $evento->hora_retorno_evento = $request->hora_retorno_evento;
        $evento->data_inscricao_close = $request->data_inscricao_close;
        $evento->data_inscricao_open = $request->data_inscricao_open;
        $evento->total_vagas_evento = $request->total_vagas_evento;
        $evento->minimo_vagas_evento = $request->minimo_vagas_evento;
        $evento->idade_minima_evento = $request->idade_minima_evento;
        $evento->max_parcela = $request->max_parcela;
        $evento->valor_evento = $request->valor_evento;
        $evento->save();

        $file = $request->allFiles('imagem')['imagem'];
        $evento_imagem = new EventoImagem();
        $evento_imagem->fk_id_evento = $evento->id;
        $evento_imagem->path = $file->store('eventos/');

        $evento_imagem->save();

        return redirect()->route('eventos.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Evento $evento)
    {
        return view('eventos.show', [
            'evento' => $evento
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $evento = Evento::find($id);

        $viagens = DB::table('viagems')
        ->SELECT(
                  'id AS id_viagem'
                , 'name'
        
                )
        ->get();

        $pessoas = DB::table('pessoas')
        ->SELECT(
                  'id AS id_pessoa'
                , 'nome AS nome_pessoa'
                , 'sobrenome AS sobrenome_pessoa'
        
                )
        ->where('tipo_pessoa', '=', 2)
        ->get();
        return view('eventos.edit')->with(['evento' => $evento, 'viagens' => $viagens, 'pessoas' => $pessoas]);
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
        $eventos = Evento::find($id)->update($request->all());
        return redirect()->route('eventos.index');
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
}
