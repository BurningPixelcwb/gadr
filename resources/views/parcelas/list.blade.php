@extends('master.layout_page')

@section('content')
 <div class="card bg-light mb-3 shadow-sm">
    <div class="card-header align-center">
        <h2 class="card-title">Vendas Realizadas</h2>
        <p class="lead small">Abaixo você confere todas as vendas que você fez.</p>
    </div>

    <div class="card-body">
      <div class="row row-cols-1 row-cols-md-3">
        @foreach($parcelas as $parcela)
        
        
        <div class="col-md-4">
                  
            <div class="card mb-4 shadow-sm">
              
              <div class="card-body">
              <h5 class="card-title">Card title</h5>
              <h6 class="card-subtitle mb-2 text-muted">Card subtitle</h6>
              <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
              <a href="#" class="card-link">Card link</a>
              <a href="#" class="card-link">Another link</a>               

              </div>

            </div>
          
        </div>
          
        @endforeach
        
      </div>
    </div>
  </div>

@endsection