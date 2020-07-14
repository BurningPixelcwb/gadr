@extends('master.layout_page')

@section('content')
    <div class="jumbotron jumbotron-fluid">
        <div class="container">
            <h1 class="display-4">Editando: Subtipo</h1>
            <p class="lead">Nesta sessão, você pode editar um tipo de viagem.</p>
        </div>
    </div>

    <div class="container">        
        
        <form action="{{ route('sub_tipo.update', ['sub_tipo' => $sub_tipo->id]) }}" method="POST">                                           
            @csrf
            @method('PUT')
        
            <div class="form-group">
                <label for="name">Nome</label>
                <input type="text" name="name" class="form-control" id="name" value="{{$sub_tipo->name}}" >
                <small id="emailHelp" class="form-text text-muted">Digite o nome.</small>
            </div>
                
            <div class="form-group">
                <label for="fk_id_tipo_viagem">Tipo Viagem: </label>
                @foreach ($tipo_viagens as $viagem)
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="fk_id_tipo_viagem" id="fk_id_tipo_viagem" value="{{$viagem->id}}">
                        <label class="form-check-label" for="fk_id_tipo_viagem">{{$viagem->name}}</label>
                    </div>
                @endforeach
            </div>  
     
            <button type="submit" class="btn btn-primary">Criar</button>


        </form>

    </div>
    @endsection