@extends('master.layout_page')


@section('content')
    <div class="jumbotron">
        <h1 class="display-4">Sub-tipo de Viagem</h1>
        <p class="lead">Abaixo você confere todos os Subtipos de viagem que estão cadastrados.</p>
        <hr class="my-4">
        <p>Para criar um novo, basta clicar no botão: "Novo".</p>
        <a class="btn btn-primary btn-lg" href="{{route('sub_tipo.create')}}" role="button">Novo</a>
    </div>

    <ul class="list-group">
        @foreach ($subtipos as $subtipo)
            <li class="list-group-item d-flex justify-content-between align-items-center">
            {{$subtipo->name}}
                <span class="">
                <a href="{{ route('sub_tipo.edit', ['sub_tipo' => $subtipo->id]) }}">     <button type="button" class="btn btn-primary">Editar</button></a>
                <a href="{{ route('sub_tipo.destroy', ['sub_tipo' => $subtipo->id]) }}">  <button type="button" class="btn btn-danger">Deletar</button></a>
                    
                </span>
            </li>
        @endforeach   
    </ul>   

@endsection