@extends('master.layout_page')

@section('content')

  <div class="card bg-light mb-3 shadow-sm">
    <div class="card-header align-center">
        <h2 class="card-title">Vendas Realizadas</h2>
        <p class="lead small">Abaixo você confere todas as vendas que você fez.</p>
    </div>

    <div class="card-body">
      <div class="row row-cols-1 row-cols-md-3">
        @foreach($vendas as $venda)
        
        
        <div class="col-md-4">
          <div class="card border-secondary mb-3" style="max-width: 18rem;">
            <div class="card-header"><h5 class="card-title">{{$venda->viagem}}</h5></div>
            <div class="card-body text-secondary">
              <h5 class="card-title">Total de parcelas: {{$venda->total_parcelas}}</h5>
              <p class="card-title">Abertas: {{$venda->aberto}}</p>
              <p class="card-title">Fechadas: {{$venda->fechado}}</p>
              <p class="card-title">Em atraso: {{$venda->atraso}}</p>
              <div class="d-flex justify-content-between align-items-center"></div>

              <a href="{{ route('parcelas.show', $venda->id_evento) }}" class="btn btn-primary">Ver parcelas</a>  
            </div>
          </div>
          
        </div>
          
        @endforeach
        
      </div>
    </div>
  </div>

@endsection