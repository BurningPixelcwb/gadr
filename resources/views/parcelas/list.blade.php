@extends('master.layout_page')

@section('content')
 <div class="card bg-light mb-3 shadow-sm">
    <div class="card-header align-center">
        <h2 class="card-title">Parcelas</h2>
        <p class="lead small">Abaixo você confere todas as parcelas do evento.</p>
    </div>

    <div class="card-body">
      <div class="row row-cols-1 row-cols-md-3">
        @foreach($parcelas as $parcela)
        
        
        <div class="col-md-3">
                  
            <div class="card mb-3 shadow-sm">
              
              <div class="card-body">
              <h5 class="card-title">{{$parcela->comprador}}</h5>
              <h6 class="card-subtitle mb-2 text-muted">{{$parcela->frm_pagamento}}: {{$parcela->parcela_total}} de R${{$parcela->vlr_parcela}}</h6>
              
              <a href="{{ route('parcelas.details', $parcela->id) }}" class="btn btn-primary">Detalhes</a>  
              <a href="#" class="btn btn-success">Resolver</a>  
              

              </div>

            </div>
          
        </div>
          
        @endforeach
        
      </div>
    </div>
  </div>

@endsection