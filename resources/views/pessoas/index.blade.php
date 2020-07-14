@extends('master.layout_page')

@section('content')
    <div class="jumbotron">
        <h1 class="display-4">Pessoas</h1>
        <p class="lead">Abaixo você confere todos as Pessoas que estão cadastradas.</p>
        <hr class="my-4">
        <p>Para criar uma nova, basta clicar no botão: "Novo".</p>
        <a class="btn btn-primary btn-lg" href="{{route('pessoas.create')}}" role="button">Novo</a>
    </div>

    <ul class="list-group">
        @foreach ($pessoas as $pessoa)
            <li class="list-group-item d-flex justify-content-between align-items-center">
            {{$pessoa->nome}} {{$pessoa->sobrenome}}
                <span class="">
                    {{$pessoa->tipo_pessoa}}
                </span>

                <span class="">
                    <a href="{{ route('pessoas.edit', ['pessoa' => $pessoa->id]) }}">     <button type="button" class="btn btn-primary">Editar</button></a>
                    <a href="{{ route('pessoas.destroy', ['pessoa' => $pessoa->id]) }}">  <button type="button" class="btn btn-danger">Deletar</button></a>
                </span>
            </li>
            
        @endforeach   
    </ul>   

@endsection