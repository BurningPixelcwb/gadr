@extends('master.layout_page')

@section('content')
    <div class="jumbotron">
        <h1 class="display-4">Eventos</h1>
        <p class="lead">Abaixo você confere todos viagens que estão cadastradas.</p>
        <hr class="my-4">
        <p>Para criar uma nova, basta clicar no botão: "Novo".</p>
        <a class="btn btn-primary btn-lg" href="{{route('eventos.create')}}" role="button">Novo</a>
    </div>

    <table class="table table-striped">
  <thead>
    <tr>
      <th scope="col">Nome da viagem</th>
      <th scope="col">Guia</th>
      <th scope="col">Abertura</th>
      <th scope="col">Fechamento</th>
      <th scope="col">Valor do evento</th>
      <th scope="col">Ação</th>
      
    </tr>
  </thead>
  <tbody>
  @foreach ($eventos as $evento)
  <tr>
    <td>{{$evento->nome_viagem}}</td>
    <td>{{$evento->guia}}</td>
    <td>{{$evento->abertura}}</td>
    <td>{{$evento->fechamento}}</td>
    <td>{{$evento->valor}}</td>
    <td><a href="{{ route('eventos.edit', ['evento' => $evento->id_evento]) }}">  <button type="button" class="btn btn-primary">Editar</button></a>
    <a href="{{ route('eventos.destroy', ['evento' => $evento->id_evento]) }}">  <button type="button" class="btn btn-danger">Deletar</button></a></td>
  </tr>
  @endforeach
  </tbody>
</table>

@endsection