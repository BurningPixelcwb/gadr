@extends('master.layout_page')

@section('content')
    <div class="jumbotron jumbotron-fluid">
        <div class="container">
            <h1 class="display-4">Evento</h1>
            <p class="lead">Nesta sessão, você pode criar novos eventos de viagem.</p>
        </div>
    </div>

    <div class="container">
    @foreach($evento->imagens as $imagem)
        <img src="{{asset('storage')}}/{{$imagem->path}}" alt="">
    @endforeach
    
    </div>

@endsection