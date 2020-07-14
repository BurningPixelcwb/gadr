@extends('master.layout_page')

@section('content')
    <div class="jumbotron jumbotron-fluid">
        <div class="container">
            <h1 class="display-4">Tipo Viagem</h1>
            <p class="lead">Nesta sessão, você pode criar novos tipos de viagem.</p>
        </div>
    </div>

    <div class="container">
        <form method="post" action="{{ route('tipo_viagem.store') }}">
            @csrf
            @method('post')
            <div class="form-group">
                <label for="name">Nome</label>
                <input type="text" name="name" class="form-control" id="name" >
                <small id="emailHelp" class="form-text text-muted">Digite o nome.</small>
            </div>
     
            <button type="submit" class="btn btn-primary">Criar</button>
        </form>
    </div>
@endsection