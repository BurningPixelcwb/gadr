<?php

namespace App\Http\Controllers;

use App\User;
use Spatie\Permission\Models\Role;
use Illuminate\Http\Request;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = User::all();

        return view('user.index', [
            'users' => $users
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('user.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
  
        /*$data = request()->validate([
            'name'          => 'required|min:2',
            'sobrenome'     => 'required|min:2',
            'nascimento'    => 'required',
            'rg'            => 'required|min:8',
            'cpf'           => 'required|min:8',
            'telefone_1'    => 'required|min:8',
            'sexo'          => 'required|min:8',
            'email'         => 'required|min:8',
            'password'      => 'required|min:8'
        ]);*/

        $user = new User();
        $user->name         = $request->name;
        $user->sobrenome    = $request->sobrenome;
        $user->nascimento   = $request->nascimento;
        $user->rg           = $request->rg;
        $user->cpf          = $request->cpf;
        $user->sexo         = $request->sexo;
        $user->email        = $request->email;
        $user->telefone1    = $request->telefone_1;
        $user->telefone2    = $request->telefone_2;
        $user->cep          = $request->cep;
        $user->logradouro   = $request->logradouro;
        $user->numero       = $request->numero;
        $user->bairro       = $request->bairro;
        $user->cidade       = $request->cidade;
        $user->estado       = $request->estado;
        $user->pais         = $request->pais;
        $user->password     = bcrypt($request->password);
        $user->save();
        
        return redirect()->route('user.index');
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
        $user = User::where('id', $id)->first();
        return view('user.edit', ['user' => $user]);
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
        $user = User::where('id', $id)->first();

        $user->name         = $request->name;
        $user->sobrenome    = $request->sobrenome;
        $user->nascimento   = $request->nascimento;
        $user->rg           = $request->rg;
        $user->cpf          = $request->cpf;
        $user->sexo         = $request->sexo;
        $user->telefone_1   = $request->telefone_1;
        $user->telefone_2   = $request->telefone_2;
        $user->cep          = $request->cep;
        $user->logradouro   = $request->logradouro;
        $user->bairro       = $request->bairro;
        $user->cidade       = $request->cidade;
        $user->estado       = $request->estado;
        $user->pais         = $request->pais;
        
        $user->save();

        return redirect()->route('user.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $user = User::where('id', $id)->first();
        $user->delete();

        return redirect()->route('user.index');
        
    }

    public function roles($user){

        $user = User::where('id', $user)->first();

        $roles = Role::all();

        foreach($roles as $role){
            if($user->hasRole($role->name)){
                $role->can = true;
            }else{
                $role->can = false;
            }
        }

        return view('user.roles', [
            'user'=>$user,
            'roles'=>$roles,
            
        ]);
    }

    public function rolesSync(Request $request, $user){
        $roles_request = $request->except(['_token', '_method']);

        foreach($roles_request as $key => $value){
            $roles[] = Role::where('id', $key)->first();
        }

        $user = User::where('id', $user)->first();
        if(!empty($roles)){
            $user->syncRoles($roles);
            
        }else{
            $user->syncRoles(null);
        }

        return redirect()->route('user.roles', ['user' => $user->id]);
    }

}
