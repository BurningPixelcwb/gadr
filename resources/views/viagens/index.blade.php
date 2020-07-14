@extends('master.layout_page')


@section('content')
    <div class="jumbotron">
        <h1 class="display-4">Viagem</h1>
        <p class="lead">Abaixo você confere todos viagens que estão cadastradas.</p>
        <hr class="my-4">
        <p>Para criar uma nova, basta clicar no botão: "Novo".</p>
        <a class="btn btn-primary btn-lg" href="{{route('viagens.create')}}" role="button">Novo</a>
    </div>

    <ul class="list-group">
        @foreach ($viagens as $viagem)
            <li class="list-group-item d-flex justify-content-between align-items-center">
            {{$viagem->nome}}
                <span class="">
                <a href="{{ route('viagens.edit', ['viagen' => $viagem->id]) }}">  <button type="button" class="btn btn-primary">Editar</button></a>
                <a href="{{ route('viagens.destroy', ['viagen' => $viagem->id]) }}">  <button type="button" class="btn btn-danger">Deletar</button></a>
                </span>
            </li>
        @endforeach
    </ul>

@endsection