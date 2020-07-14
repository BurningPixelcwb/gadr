@extends('master.layout_page')

@section('content')
    <div class="jumbotron jumbotron-fluid">
        <div class="container">
            <h1 class="display-4">Viagem</h1>
            <p class="lead">Nesta sessão, você pode criar novos subtipos de viagem.</p>
        </div>
    </div>

    <div class="container">
        <form method="post" action="{{ route('viagens.store') }}">
            @csrf
            @method('post')

            <div class="row">
    
                <div class="col-md-8 mb-3 form-group">
                    <label for="nome">Nome</label>
                    <input type="text" class="form-control" id="nome" name="name" placeholder="" value="" required="">
                    <div class="invalid-feedback">
                    Valid first name is required.
                    </div>
                </div>    

                <div class="col-md-4 mb-3 form-group">
                    <label for="state">Subtipo</label>
                    <select class="custom-select d-block w-100" id="state" name="fk_id_sub_tipo" required>
                        @foreach ($subtipos as $subtipo)
                            <option value="{{$subtipo->id}}">{{$subtipo->name}}</option>
                        @endforeach
                    </select>
                    <div class="invalid-feedback">
                    Please provide a valid state.
                    </div>
                </div>

            </div>

            <button class="btn btn-primary btn-lg" type="submit">Criar</button>     
            
        </form>
    </div>
@endsection