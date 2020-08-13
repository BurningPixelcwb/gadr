@extends('master.layout_page')

@section('content')

    @foreach($eventos as $evento)
    <form method="post" action="{{ route('compras.store') }}">
        @csrf
        @method('post')

    <div class="card bg-light mb-3 shadow-sm">
        <div class="card-header align-center">
            <h5 class="card-title">{{$evento->nome_evento}}</h5>
        </div>

        <div class="card-body">

            <div class="row">
                <div class="col-md-4 order-md-2 mb-4">
                    <h4 class="d-flex justify-content-between align-items-center mb-3">
                        <span class="text-muted">Mais informações do evento</span>
                        
                    </h4>
                    <ul class="list-group mb-3">
                        <li class="list-group-item d-flex justify-content-between lh-condensed">
                            <div><h6 class="my-0">Guia</h6></div>
                            <span class="text-muted">{{$evento->guia}}</span>
                        </li>

                        <li class="list-group-item d-flex justify-content-between lh-condensed">
                            <div><h6 class="my-0">Valor evento</h6></div>
                            <span class="text-muted">{{$evento->valor_evento}}</span>
                        </li>

                        <li class="list-group-item d-flex justify-content-between lh-condensed">
                            <div><h6 class="my-0">Data de ida</h6></div>
                            <span class="text-muted">{{$evento->data_ida}}</span>
                        </li>

                        <li class="list-group-item d-flex justify-content-between lh-condensed">
                            <div><h6 class="my-0">Data de retorno</h6></div>
                            <span class="text-muted">{{$evento->data_volta}}</span>
                        </li>

                        <li class="list-group-item d-flex justify-content-between lh-condensed">
                            <div>
                                <h6 class="my-0">Total de vagas</h6>
                            </div>
                            <span class="text-muted">{{$evento->total_vagas}}</span>
                        </li>

                        <li class="list-group-item d-flex justify-content-between lh-condensed">
                            <div><h6 class="my-0">Mínimo de vagas</h6></div>
                            <span class="text-muted">{{$evento->min_vagas}}</span>
                        </li>

                        <li class="list-group-item d-flex justify-content-between bg-light">
                            <div class="text-success">
                                <h6 class="my-0">Vagas restantes</h6>
                            </div>
                            <span class="text-success">5</span>
                        </li>

                        <li class="list-group-item d-flex justify-content-between">
                            <span>Total (USD)</span>
                            <strong>$20</strong>
                        </li>

                    </ul>
                </div>

                <div class="col-md-8 order-md-1">
                <h4 class="mb-3">Compra do cliente</h4>
                
                    <div class="row">

                        <div class="col-md-6 mb-3">
                            <label for="inputState">Cliente</label>
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
                                    <select id="guia" name="fk_id_pessoa" class="form-control">
                                        <option selected>Escolher...</option>
                                        @foreach ($pessoas as $pessoa)
                                            <option value="{{ $pessoa->id }}"> {{ $pessoa->nome }} {{ $pessoa->sobrenome }}</option>
                                        @endforeach

                                    </select>
                                </div>
                            <div class="invalid-feedback">
                                Valid first name is required.
                            </div>
                        </div>

                        <div class="col-md-3 mb-3">
                            <label for="exampleFormControlInput1">Forma pagamento</label>

                            <select id="forma_pagamento" name="forma_pagamento" class="form-control">
                                <option value="0">Escolher...</option>
                                <option value="1">Boleto</option>
                                <option value="2">Depósito</option>
                                <option value="3">Cartão de Crédito</option>
                            
                            </select>

                            <div class="invalid-feedback">
                                Valid last name is required.
                            </div>

                        </div>

                        <div class="col-md-3 mb-3" id="qnt_parcela">
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
                                <input type="text" id="ipt_parcela" name="parcela" disabled class="form-control dsb">
                            </div>
                            <div class="invalid-feedback">
                                Valid last name is required.
                            </div>
                        </div>

                        <div class="col-md-6 mb-3">
                            <label for="inputState">Emissor boleto</label>
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
                                    <select id="emissor_boleto" name="fk_id_pessoa" class="form-control dsb" disabled>
                                        <option selected>Escolher...</option>
                                        <option value="1">Itau</option>
                                        <option value="2">Caixa</option>
                                        <option value="3">Banco Inter</option>
                                        
                                    </select>
                                </div>
                            <div class="invalid-feedback">
                                Valid first name is required.
                            </div>
                        </div>

                        <div class="col-md-4 mb-3">
                            <label for="exampleFormControlInput1">Vencimento da parcela</label>
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
                                <input type="text" id="dt_vencimento_parcela" name="dt_vencimento_parcela" class="form-control dsb" disabled>
                            </div>
                            <div class="invalid-feedback">
                                Valid last name is required.
                            </div>
                        </div>

                    </div>

                    <input type="hidden" name="fk_id_evento"    id="" value="{{$evento->id}}">
                    <input type="hidden" name="fk_id_vendedor"  id="" value="{{$user->id}}">
                    <input type="hidden" name="valor_evento"    id="" value="{{$evento->valor_evento}}">

                    <hr class="mb-4">
                    <button class="btn btn-primary btn-lg btn-block" type="submit">Realizar venda</button>


                
            </div>

            
        </div>

    </div>  
    </form>

@endforeach

<script>
    $("#forma_pagamento").change(function(){
        var opcao = $(this).children("option:selected").val();

        if(opcao == 1){           
            $('input').attr('disabled', 'disabled');
            $('#ipt_parcela').removeAttr('disabled');
            $('#dt_vencimento_parcela').removeAttr('disabled');
            
        }else if(opcao == 2){
            $('input').attr('disabled', 'disabled');
            $('#emissor_boleto').removeAttr('disabled');
            $('#dt_vencimento_parcela').removeAttr('disabled');

        }else if(opcao == 0){
            $('.dsb').attr('disabled', 'disabled');

        }else{
            $('input').attr('disabled', 'disabled');
            $('#emissor_boleto').removeAttr('disabled');
            $('#ipt_parcela').removeAttr('disabled');
            $('#dt_vencimento_parcela').removeAttr('disabled');
        }
        
    });
</script>

<style>
    .invisivel{
        visibility: hidden;
    }
</style>
@endsection