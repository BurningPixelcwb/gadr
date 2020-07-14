@extends('master.layout_page')

@section('content')
    <div class="jumbotron jumbotron-fluid">
        <div class="container">
            <h1 class="display-4">Evento</h1>
            <p class="lead">Nesta sessão, você pode criar novos compras de evento.</p>
        </div>
    </div>

    <div class="container">
        <form method="post" action="{{ route('compras.store') }}">
            @csrf
            @method('post')
  
            <h4 class="mb-3">Guia e descrição</h4>
            <div class="form-row">
                <div class="form-group col-md-6">
                    <label for="evento">Evento</label>
                    <div class="input-group mb-2">
                        <div class="input-group-prepend">
                            <div class="input-group-text">

                                <svg class="bi bi-image-alt" width="1em" height="1em" viewBox="0 0 16 16" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M10.648 6.646a.5.5 0 01.577-.093l4.777 3.947V15a1 1 0 01-1 1h-14a1 1 0 01-1-1v-2l3.646-4.354a.5.5 0 01.63-.062l2.66 2.773 3.71-4.71z"/>
                                    <path fill-rule="evenodd" d="M4.5 5a2.5 2.5 0 100-5 2.5 2.5 0 000 5z" clip-rule="evenodd"/>
                                </svg>

                            </div>
                        </div>
                        <select id="evento" name="fk_id_evento" class="form-control">
                            <option selected>Escolher...</option>
                            @foreach ($eventos as $evento)
                                <option value="{{ $evento->id }}"> {{ $evento->name }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>

                <div class="form-group col-md-6">
                    <label for="inputState">Pessoa</label>
                    <div class="input-group mb-2">
                        <div class="input-group-prepend">
                            <div class="input-group-text">

                                    <svg class="bi bi-people-circle" width="1em" height="1em" viewBox="0 0 16 16" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                                        <path d="M13.468 12.37C12.758 11.226 11.195 10 8 10s-4.757 1.225-5.468 2.37A6.987 6.987 0 008 15a6.987 6.987 0 005.468-2.63z"/>
                                        <path fill-rule="evenodd" d="M8 9a3 3 0 100-6 3 3 0 000 6z" clip-rule="evenodd"/>
                                        <path fill-rule="evenodd" d="M8 1a7 7 0 100 14A7 7 0 008 1zM0 8a8 8 0 1116 0A8 8 0 010 8z" clip-rule="evenodd"/>
                                    </svg>

                            </div>
                        </div>
                    <select id="guia" name="fk_responsavel_evento" class="form-control">
                        <option selected>Escolher...</option>
                        @foreach ($pessoas as $pessoa)
                            <option value="{{ $pessoa->id }}"> {{ $pessoa->nome }} {{ $pessoa->sobrenome }}</option>
                        @endforeach
                    </select>
                </div>
                </div>

            </div>

            <hr class="mb-4">
            <h4 class="mb-3">Pagamento</h4>
            <div class="form-row">
                <div class="form-group col-md-4">
                    <label for="exampleFormControlInput1">Valor do evento</label>
                    <div class="input-group mb-2">
                        <div class="input-group-prepend">
                            <div class="input-group-text">$</div>
                        </div>
                        <input type="text" name="valor_evento" class="form-control money" id="exampleFormControlInput1" >
                    </div>
                </div>

                <div class="form-group col-md-4">
                    <label for="exampleFormControlInput1">Parcelas</label>
                    <div class="input-group mb-2">
                        <div class="input-group-prepend">
                            <div class="input-group-text">

                            <svg class="bi bi-plus-circle" width="1em" height="1em" viewBox="0 0 16 16" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                                <path fill-rule="evenodd" d="M8 3.5a.5.5 0 01.5.5v4a.5.5 0 01-.5.5H4a.5.5 0 010-1h3.5V4a.5.5 0 01.5-.5z" clip-rule="evenodd"/>
                                <path fill-rule="evenodd" d="M7.5 8a.5.5 0 01.5-.5h4a.5.5 0 010 1H8.5V12a.5.5 0 01-1 0V8z" clip-rule="evenodd"/>
                                <path fill-rule="evenodd" d="M8 15A7 7 0 108 1a7 7 0 000 14zm0 1A8 8 0 108 0a8 8 0 000 16z" clip-rule="evenodd"/>
                            </svg>

                            </div>
                        </div>
                        <input type="text" name="max_parcela" class="form-control" id="exampleFormControlInput1" >
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