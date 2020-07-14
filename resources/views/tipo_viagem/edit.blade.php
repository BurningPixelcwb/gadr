@extends('master.layout_page')

@section('content')
    <div class="jumbotron jumbotron-fluid">
        <div class="container">
            <h1 class="display-4">Editando: Tipo Viagem</h1>
            <p class="lead">Nesta sessão, você pode editar um tipo de viagem.</p>
        </div>
    </div>

    <div class="container">
        <form action="{{ route('tipo_viagem.update', ['tipo_viagem' => $tipo_viagem->id]) }}" method="POST">
            @csrf
            @method('PUT')
            <div class="form-group">
                <label for="name">Nome</label>
                <input type="text" name="name" class="form-control" id="name" value="{{old('tipo_viagem', $tipo_viagem->name)}}" >
                <small id="emailHelp" class="form-text text-muted">Digite o nome.</small>
            </div>
     
            <button type="submit" class="btn btn-primary">Alterar</button>
        </form>

    </div>
    @endsection