@extends('master.layout_page')

@section('content')

  <div class="card bg-light mb-3 shadow-sm">
    <div class="card-header align-center">
        <h2 class="card-title">Eventos programados</h2>
        <p class="lead small">Abaixo você confere todos os eventos que estão programados e com inscrições abertas.</p>
    </div>

    <div class="card-body">
    <div class="row row-cols-1 row-cols-md-3">
        @foreach($eventos as $evento)
        
            <div class="col-md-4">
                  
                <div class="card mb-4 shadow-sm">
                  <a href="{{ route('compras.show', $evento->id) }}">
                    <img src="{{asset('storage')}}/{{$evento->imagem}}" class="card-img" alt="{{$evento->nome}}">
                  </a>
                  
                  <div class="card-body">
                    <h5 class="card-title">{{$evento->nome}}</h5>
                    <p class="card-text">{{$evento->descricao}}</p>
                    <div class="d-flex justify-content-between align-items-center">
                    <a href="{{ route('compras.show', $evento->id) }}" class="btn btn-success">Comprar</a>
                    </div>
                  </div>
                  <div class="card-footer">
                    <small class="text-muted">Fechamento de inscrições: {{$evento->fechamento}}</small>
                  </div>
                </div>
              
            </div>
          
        @endforeach
        
      </div>
    
    </div>

  </div>

@endsection