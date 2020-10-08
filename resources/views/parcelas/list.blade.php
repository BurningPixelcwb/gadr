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
                  
        @if($parcela->status == 'Aberto')

          <div class="card border-info mb-3" style="max-width: 18rem;">
            <div class="card-header">{{$parcela->status}}</div>
            <div class="card-body text-info">
              <h5 class="card-title">{{$parcela->comprador}}</h5>
              <p class="card-text">{{$parcela->frm_pagamento}}: {{$parcela->parcela_total}} de R${{$parcela->vlr_parcela}}</p>
              <p class="card-text">Vencimento em: {{$parcela->vencimento}}</p>
              @if ($parcela->status = 'Aberto') <a href="#" class="btn btn-primary">Detalhes</a>
              @endif
            </div>
          </div>

        @elseif($parcela->status == 'Fechado')
          <div class="card border-success mb-3" style="max-width: 18rem;">
            <div class="card-header">{{$parcela->status}}</div>
            <div class="card-body text-success">
            <h5 class="card-title">{{$parcela->comprador}}</h5>
              <p class="card-text">{{$parcela->frm_pagamento}}: {{$parcela->parcela_total}} de R${{$parcela->vlr_parcela}}</p>
              <p class="card-text">Vencimento em: {{$parcela->vencimento}}</p>
              @if ($parcela->status = 'Aberto') <a href="#" class="btn btn-primary">Detalhes</a>
              @endif
            </div>
          </div>

        @else
          <div class="card border-warning mb-3" style="max-width: 18rem;">
            <div class="card-header">{{$parcela->status}}</div>
            <div class="card-body text-warning">
              <h5 class="card-title">{{$parcela->comprador}}</h5>
              <p class="card-text">{{$parcela->frm_pagamento}}: {{$parcela->parcela_total}} de R${{$parcela->vlr_parcela}}</p>
              <p class="card-text">Vencimento em: {{$parcela->vencimento}}</p>
              @if ($parcela->status = 'Aberto') <a href="#" class="btn btn-primary">Dar baixa</a> @else 
              <a href="#" class="btn btn-success">Alterar</a>
              @endif
            </div>
          </div>

        @endif

          
        </div>
          
        @endforeach
        
      </div>
    </div>
  </div>

@endsection