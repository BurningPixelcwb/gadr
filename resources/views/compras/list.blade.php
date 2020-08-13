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
                  
            <div class="card mb-4 shadow-sm">
              
              <div class="card-body">
                <h5 class="card-title">{{$venda->name}}</h5>
                <div class="d-flex justify-content-between align-items-center">
                
                </div>

                <a href="{{ route('parcelas.show', $venda->id_evento) }}" class="btn btn-primary">Ver parcelas</a>  

              </div>

            </div>
          
        </div>
          
        @endforeach
        
      </div>
    </div>
  </div>

@endsection