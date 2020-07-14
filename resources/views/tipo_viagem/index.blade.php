@extends('master.layout_page')


@section('content')
    <div class="jumbotron">
        <h1 class="display-4">Tipo Viagem</h1>
        <p class="lead">Abaixo você confere todos os tipos de viagem que estão cadastrados.</p>
        <hr class="my-4">
        <p>Para criar um novo, basta clicar no botão: "Novo".</p>
        <a class="btn btn-primary btn-lg" href="{{route('tipo_viagem.create')}}" role="button">Novo</a>
    </div>

    <ul class="list-group">
        @foreach ($tipos_viagem as $tipo_viagem)
            <li class="list-group-item d-flex justify-content-between align-items-center">
            {{$tipo_viagem->name}}
                <span class="">
                <a href="{{ route('tipo_viagem.edit', ['tipo_viagem' => $tipo_viagem->id]) }}">     <button type="button" class="btn btn-primary">Editar</button></a>
                <a href="{{ route('tipo_viagem.destroy', ['tipo_viagem' => $tipo_viagem->id]) }}">  <button type="button" class="btn btn-danger">Deletar</button></a>
                    
                </span>
            </li>
        @endforeach   
    </ul>   

@endsection