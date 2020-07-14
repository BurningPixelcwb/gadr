@extends('master.layout_page')

@section('content')
    <div class="jumbotron jumbotron-fluid">
        <div class="container">
            <h1 class="display-4">Editando: Viagem</h1>
            <p class="lead">Nesta sessão, você pode editar uma viagem.</p>
        </div>
    </div>

    <div class="container">
        <form  action="{{ route('viagens.update', ['viagen' => $viagens->id]) }}" method="POST">
            @csrf
            @method('PUT')
            <div class="row">
    
                <div class="col-md-8 mb-3 form-group">
                    <label for="nome">Nome</label>
                    <input type="text" class="form-control" id="nome" name="name" placeholder="Nome Viagem" value="{{$viagens->name}}" required="">
                    <input type="hidden" class="form-control" id="id_viagem" name="id_viagem" value="{{$viagens->name}}">
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
     
            <button type="submit" class="btn btn-primary">Alterar</button>
        </form>
    </div>
    @endsection