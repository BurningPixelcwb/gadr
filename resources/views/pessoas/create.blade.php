@extends('master.layout_page')

@section('content')
    <div class="jumbotron jumbotron-fluid">
        <div class="container">
            <h1 class="display-4">Pessoa</h1>
            <p class="lead">Nesta sessão, você pode criar novas Pessoas.</p>
        </div>
    </div>

    <div class="container">
        <form method="post" action="{{ route('pessoas.store') }}">
            @csrf
            @method('post')

            <h4 class="mb-3">Cadastro</h4>
            <div class="form-row">
            
                <div class="form-group col-md-4">
                    <label for="exampleFormControlInput1">Nome</label>
                    <input type="text" class="form-control datepicker" name="nome" id="nome">
                </div>

                <div class="form-group col-md-4">
                    <label for="exampleFormControlInput1">Sobrenome</label>
                    <input type="text" class="form-control" name="sobrenome" id="sobrenome" >
                </div>

                <div class="form-group col-md-1">
                    <label for="exampleFormControlInput1">Idade</label>
                    <input type="text" class="form-control" name="idade" id="exampleFormControlInput1" >
                </div>

                <div class="form-group col-md-3">
                    <label for="exampleFormControlInput1">CPF</label>
                    <input type="text" class="form-control" name="cpf" id="exampleFormControlInput1" >
                </div>

            </div>

            <hr class="mb-4">
            <h4 class="mb-3">Tipo Pessoa</h4>

            <div class="form-row">
                <div class="form-group col-md-3">

                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="tipo_pessoa" id="cliente" value="1">
                        <label class="form-check-label" for="cliente">Cliente</label>
                    </div>

                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="tipo_pessoa" id="guia" value="2">
                        <label class="form-check-label" for="guia">Guia</label>
                    </div>

                </div>  
            </div>

            <hr class="mb-4">

            <div class="form-row">
                <button class="btn btn-primary btn-lg" type="submit">Criar</button>         
            </div>

        </form>
    </div>
@endsection