<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pessoa;

class PessoaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $pessoas = Pessoa::All();
        return view('pessoas.index')->with(['pessoas' => $pessoas]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('pessoas.create');
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
            'nome'        => 'required|string|max:255'
          , 'sobrenome'   => 'required|string|max:255'
          , 'idade'       => 'required|integer'
          , 'cpf'         => 'required|numeric'
      ]);

      Pessoa::create($request->all());
      return redirect()->route('pessoas.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $pessoa = Pessoa::find($id);
        return view('pessoas.edit')->with(['pessoa' => $pessoa]);
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
              'nome'        => 'required|string|max:255'
            , 'sobrenome'   => 'required|string|max:255'
            , 'idade'       => 'required|integer'
            , 'cpf'         => 'required|numeric'
        ]);

        $pessoas = Pessoa::find($id)->update($request->all());
        return redirect()->route('pessoas.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $pessoas = Pessoa::find($id)->delete();
        return redirect()->route('pessoas.index');
    }
}
