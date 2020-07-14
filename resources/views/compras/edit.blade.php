@extends('master.layout_page')

@section('content')
    <div class="jumbotron jumbotron-fluid">
        <div class="container">
            <h1 class="display-4">Editando: Viagem</h1>
            <p class="lead">Nesta sessão, você pode editar uma viagem.</p>
        </div>
    </div>

    <div class="container">
    
        <form method="post" action="{{ route('eventos.update', [$evento->id]) }}" autocomplete="off" class="form-horizontal">
            @csrf
            @method('PUT')
            
            <h4 class="mb-3">Guia e descrição</h4>
            <div class="form-row">
                <div class="form-group col-md-6">
                    <label for="viagem">Viagem</label>
                    <div class="input-group mb-2">
                        <div class="input-group-prepend">
                            <div class="input-group-text">

                                <svg class="bi bi-image-alt" width="1em" height="1em" viewBox="0 0 16 16" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M10.648 6.646a.5.5 0 01.577-.093l4.777 3.947V15a1 1 0 01-1 1h-14a1 1 0 01-1-1v-2l3.646-4.354a.5.5 0 01.63-.062l2.66 2.773 3.71-4.71z"/>
                                    <path fill-rule="evenodd" d="M4.5 5a2.5 2.5 0 100-5 2.5 2.5 0 000 5z" clip-rule="evenodd"/>
                                </svg>

                            </div>
                        </div>
                        <select id="viagem" name="fk_id_viagem" class="form-control">
                            <option >Escolher...</option>
                            @foreach ($viagens as $viagem)
                                <option value="{{ $viagem->id_viagem }}" @if($viagem->id_viagem == $evento->fk_id_viagem) selected @endif> {{ $viagem->name }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>

                <div class="form-group col-md-6">
                    <label for="inputState">Guia</label>
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
                        <option>Escolher...</option>
                        @foreach ($pessoas as $pessoa)
                            <option value="{{ $pessoa->id_pessoa }}" @if($pessoa->id_pessoa == $evento->fk_responsavel_evento) selected @endif> {{ $pessoa->nome_pessoa }} {{ $pessoa->sobrenome_pessoa }}</option>
                        @endforeach
                    </select>
                </div>
                </div>

            </div>

            <div class="form-row">
                <div class="form-group col-md-12">
                    <label for="validationTextarea">Descrição do evento</label>
                    <textarea class="form-control" id="validationTextarea" name="desc_evento" placeholder="Descrição do evento" >{{$evento->desc_evento}}</textarea>
                    <div class="invalid-feedback">
                        Descrição do evento
                    </div>
                </div>
            </div>

            <hr class="mb-4">
            <h4 class="mb-3">Ida e retorno</h4>
            <div class="form-row">
            
                <div class="form-group col-md-2">
                    <label for="inlineFormInputGroup">Data de ida</label>
                    <div class="input-group mb-2">
                        <div class="input-group-prepend">
                            <div class="input-group-text">

                                <svg class="bi bi-calendar" width="1em" height="1em" viewBox="0 0 16 16" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                                    <path fill-rule="evenodd" d="M14 0H2a2 2 0 00-2 2v12a2 2 0 002 2h12a2 2 0 002-2V2a2 2 0 00-2-2zM1 3.857C1 3.384 1.448 3 2 3h12c.552 0 1 .384 1 .857v10.286c0 .473-.448.857-1 .857H2c-.552 0-1-.384-1-.857V3.857z" clip-rule="evenodd"/>
                                    <path fill-rule="evenodd" d="M6.5 7a1 1 0 100-2 1 1 0 000 2zm3 0a1 1 0 100-2 1 1 0 000 2zm3 0a1 1 0 100-2 1 1 0 000 2zm-9 3a1 1 0 100-2 1 1 0 000 2zm3 0a1 1 0 100-2 1 1 0 000 2zm3 0a1 1 0 100-2 1 1 0 000 2zm3 0a1 1 0 100-2 1 1 0 000 2zm-9 3a1 1 0 100-2 1 1 0 000 2zm3 0a1 1 0 100-2 1 1 0 000 2zm3 0a1 1 0 100-2 1 1 0 000 2z" clip-rule="evenodd"/>
                                </svg>

                            </div>
                        </div>
                        <input type="text" name="data_ida_evento" class="form-control datepicker" id="data_ida_evento" value="{{$evento->data_ida_evento}}">
                    </div>
                </div>

                
                
                <div class="form-group col-md-2">
                    <label for="exampleFormControlInput1">Hora de ida</label>
                    <div class="input-group mb-2">
                        <div class="input-group-prepend">
                            <div class="input-group-text">
                            <svg class="bi bi-clock" width="1em" height="1em" viewBox="0 0 16 16" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                                <path fill-rule="evenodd" d="M8 15A7 7 0 108 1a7 7 0 000 14zm8-7A8 8 0 110 8a8 8 0 0116 0z" clip-rule="evenodd"/>
                                <path fill-rule="evenodd" d="M7.5 3a.5.5 0 01.5.5v5.21l3.248 1.856a.5.5 0 01-.496.868l-3.5-2A.5.5 0 017 9V3.5a.5.5 0 01.5-.5z" clip-rule="evenodd"/>
                            </svg>

                            </div>
                        </div>
                        <input type="text" class="form-control time" name="hora_ida_evento" id="time" maxlength="5"  value="{{$evento->hora_ida_evento}}">
                    </div>
                </div>

                <div class="form-group col-md-2">
                    <label for="exampleFormControlInput1">Local de ida</label>
                    <div class="input-group mb-2">
                        <div class="input-group-prepend">
                            <div class="input-group-text">

                            <svg class="bi bi-geo" width="1em" height="1em" viewBox="0 0 16 16" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                                <path d="M11 4a3 3 0 11-6 0 3 3 0 016 0z"/>
                                <path d="M7.5 4h1v9a.5.5 0 01-1 0V4z"/>
                                <path fill-rule="evenodd" d="M6.489 12.095a.5.5 0 01-.383.594c-.565.123-1.003.292-1.286.472-.302.192-.32.321-.32.339 0 .013.005.085.146.21.14.124.372.26.701.382.655.246 1.593.408 2.653.408s1.998-.162 2.653-.408c.329-.123.56-.258.701-.382.14-.125.146-.197.146-.21 0-.018-.018-.147-.32-.339-.283-.18-.721-.35-1.286-.472a.5.5 0 11.212-.977c.63.137 1.193.34 1.61.606.4.253.784.645.784 1.182 0 .402-.219.724-.483.958-.264.235-.618.423-1.013.57-.793.298-1.855.472-3.004.472s-2.21-.174-3.004-.471c-.395-.148-.749-.336-1.013-.571-.264-.234-.483-.556-.483-.958 0-.537.384-.929.783-1.182.418-.266.98-.47 1.611-.606a.5.5 0 01.595.383z" clip-rule="evenodd"/>
                            </svg>

                            </div>
                        </div>
                        <input type="text" name="local_ida_evento" class="form-control" id="exampleFormControlInput1" value="{{$evento->local_ida_evento}}" >
                    </div>
                    
                </div>
                

                <div class="form-group col-md-2">
                    <label for="exampleFormControlInput1">Data de retorno</label>
                    <div class="input-group mb-2">
                        <div class="input-group-prepend">
                            <div class="input-group-text">

                            <svg class="bi bi-calendar-fill" width="1em" height="1em" viewBox="0 0 16 16" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                                <path d="M0 2a2 2 0 012-2h12a2 2 0 012 2H0z"/>
                                <path fill-rule="evenodd" d="M0 3h16v11a2 2 0 01-2 2H2a2 2 0 01-2-2V3zm6.5 4a1 1 0 100-2 1 1 0 000 2zm4-1a1 1 0 11-2 0 1 1 0 012 0zm2 1a1 1 0 100-2 1 1 0 000 2zm-8 2a1 1 0 11-2 0 1 1 0 012 0zm2 1a1 1 0 100-2 1 1 0 000 2zm4-1a1 1 0 11-2 0 1 1 0 012 0zm2 1a1 1 0 100-2 1 1 0 000 2zm-8 2a1 1 0 11-2 0 1 1 0 012 0zm2 1a1 1 0 100-2 1 1 0 000 2zm4-1a1 1 0 11-2 0 1 1 0 012 0z" clip-rule="evenodd"/>
                            </svg>

                            </div>
                        </div>
                        <input type="text" name="data_retorno_evento" class="form-control datepicker" id="exampleFormControlInput1" value="{{$evento->data_retorno_evento}}">
                    </div>
                </div>
                <div class="form-group col-md-2">
                    <label for="exampleFormControlInput1">Hora de retorno</label>
                    <div class="input-group mb-2">
                        <div class="input-group-prepend">
                            <div class="input-group-text">

                                <svg class="bi bi-clock-fill" width="1em" height="1em" viewBox="0 0 16 16" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                                    <path fill-rule="evenodd" d="M16 8A8 8 0 110 8a8 8 0 0116 0zM8 3.5a.5.5 0 00-1 0V9a.5.5 0 00.252.434l3.5 2a.5.5 0 00.496-.868L8 8.71V3.5z" clip-rule="evenodd"/>
                                </svg>

                            </div>
                        </div>
                        <input type="text" class="form-control time" name="hora_retorno_evento" class="form-control" id="exampleFormControlInput1" value="{{$evento->hora_retorno_evento}}">
                    </div>
                </div>

                <div class="form-group col-md-2">
                    <label for="exampleFormControlInput1">Local de retorno</label>
                    <div class="input-group mb-2">
                        <div class="input-group-prepend">
                            <div class="input-group-text">

                            <svg class="bi bi-geo-alt" width="1em" height="1em" viewBox="0 0 16 16" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                                <path fill-rule="evenodd" d="M8 16s6-5.686 6-10A6 6 0 002 6c0 4.314 6 10 6 10zm0-7a3 3 0 100-6 3 3 0 000 6z" clip-rule="evenodd"/>
                            </svg>

                            </div>
                        </div>
                        <input type="text" name="local_retorno_evento" class="form-control" id="exampleFormControlInput1" value="{{$evento->local_retorno_evento}}">
                    </div>
                </div>
                
            </div>
          
            <hr class="mb-4">
            <h4 class="mb-3">Inscrição</h4>
            <div class="form-row">
                <div class="form-group col-md-3">
                    <label for="exampleFormControlInput1">Data de abertua de inscrição</label>
                    <div class="input-group mb-2">
                        <div class="input-group-prepend">
                            <div class="input-group-text">

                                <svg class="bi bi-calendar" width="1em" height="1em" viewBox="0 0 16 16" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                                    <path fill-rule="evenodd" d="M14 0H2a2 2 0 00-2 2v12a2 2 0 002 2h12a2 2 0 002-2V2a2 2 0 00-2-2zM1 3.857C1 3.384 1.448 3 2 3h12c.552 0 1 .384 1 .857v10.286c0 .473-.448.857-1 .857H2c-.552 0-1-.384-1-.857V3.857z" clip-rule="evenodd"/>
                                    <path fill-rule="evenodd" d="M6.5 7a1 1 0 100-2 1 1 0 000 2zm3 0a1 1 0 100-2 1 1 0 000 2zm3 0a1 1 0 100-2 1 1 0 000 2zm-9 3a1 1 0 100-2 1 1 0 000 2zm3 0a1 1 0 100-2 1 1 0 000 2zm3 0a1 1 0 100-2 1 1 0 000 2zm3 0a1 1 0 100-2 1 1 0 000 2zm-9 3a1 1 0 100-2 1 1 0 000 2zm3 0a1 1 0 100-2 1 1 0 000 2zm3 0a1 1 0 100-2 1 1 0 000 2z" clip-rule="evenodd"/>
                                </svg>

                            </div>
                        </div>
                        <input type="text" name="data_inscricao_open" class="form-control datepicker" id="exampleFormControlInput1" value="{{$evento->data_inscricao_open}}">
                    </div>
                </div>

                <div class="form-group col-md-3">
                    <label for="exampleFormControlInput1">Data de fechamento de inscrição</label>
                    <div class="input-group mb-2">
                        <div class="input-group-prepend">
                            <div class="input-group-text">

                            <svg class="bi bi-calendar-fill" width="1em" height="1em" viewBox="0 0 16 16" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                                <path d="M0 2a2 2 0 012-2h12a2 2 0 012 2H0z"/>
                                <path fill-rule="evenodd" d="M0 3h16v11a2 2 0 01-2 2H2a2 2 0 01-2-2V3zm6.5 4a1 1 0 100-2 1 1 0 000 2zm4-1a1 1 0 11-2 0 1 1 0 012 0zm2 1a1 1 0 100-2 1 1 0 000 2zm-8 2a1 1 0 11-2 0 1 1 0 012 0zm2 1a1 1 0 100-2 1 1 0 000 2zm4-1a1 1 0 11-2 0 1 1 0 012 0zm2 1a1 1 0 100-2 1 1 0 000 2zm-8 2a1 1 0 11-2 0 1 1 0 012 0zm2 1a1 1 0 100-2 1 1 0 000 2zm4-1a1 1 0 11-2 0 1 1 0 012 0z" clip-rule="evenodd"/>
                            </svg>

                            </div>
                        </div>
                        <input type="text" name="data_inscricao_close" class="form-control datepicker" id="exampleFormControlInput1" value="{{$evento->data_inscricao_close}}">
                    </div>
                </div>

                <div class="form-group col-md-2">
                    <label for="exampleFormControlInput1">Idade mínima</label>
                    <div class="input-group mb-2">
                        <div class="input-group-prepend">
                            <div class="input-group-text">

                                <svg class="bi bi-person-dash" width="1em" height="1em" viewBox="0 0 16 16" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                                    <path fill-rule="evenodd" d="M11 14s1 0 1-1-1-4-6-4-6 3-6 4 1 1 1 1h10zm-9.995-.944v-.002.002zM1.022 13h9.956a.274.274 0 00.014-.002l.008-.002c-.001-.246-.154-.986-.832-1.664C9.516 10.68 8.289 10 6 10c-2.29 0-3.516.68-4.168 1.332-.678.678-.83 1.418-.832 1.664a1.05 1.05 0 00.022.004zm9.974.056v-.002.002zM6 7a2 2 0 100-4 2 2 0 000 4zm3-2a3 3 0 11-6 0 3 3 0 016 0zm2 2.5a.5.5 0 01.5-.5h4a.5.5 0 010 1h-4a.5.5 0 01-.5-.5z" clip-rule="evenodd"/>
                                </svg>

                            </div>
                        </div>
                        <input type="text" name="idade_minima_evento" class="form-control" id="exampleFormControlInput1" value="{{$evento->idade_minima_evento}}">
                    </div>
                </div>

                <div class="form-group col-md-2">
                    <label for="exampleFormControlInput1">Total de vagas</label>
                    <div class="input-group mb-2">
                        <div class="input-group-prepend">
                            <div class="input-group-text">

                                <svg class="bi bi-person-lines-fill" width="1em" height="1em" viewBox="0 0 16 16" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                                    <path fill-rule="evenodd" d="M1 14s-1 0-1-1 1-4 6-4 6 3 6 4-1 1-1 1H1zm5-6a3 3 0 100-6 3 3 0 000 6zm7 1.5a.5.5 0 01.5-.5h2a.5.5 0 010 1h-2a.5.5 0 01-.5-.5zm-2-3a.5.5 0 01.5-.5h4a.5.5 0 010 1h-4a.5.5 0 01-.5-.5zm0-3a.5.5 0 01.5-.5h4a.5.5 0 010 1h-4a.5.5 0 01-.5-.5zm2 9a.5.5 0 01.5-.5h2a.5.5 0 010 1h-2a.5.5 0 01-.5-.5z" clip-rule="evenodd"/>
                                </svg>

                            </div>
                        </div>
                        <input type="text" name="total_vagas_evento" class="form-control" id="exampleFormControlInput1" value="{{$evento->total_vagas_evento}}">
                    </div>
                </div>

                <div class="form-group col-md-2">
                    <label for="exampleFormControlInput1">Mínimo de vagas</label>
                    <div class="input-group mb-2">
                        <div class="input-group-prepend">
                            <div class="input-group-text">

                                <svg class="bi bi-person-dash-fill" width="1em" height="1em" viewBox="0 0 16 16" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                                    <path fill-rule="evenodd" d="M1 14s-1 0-1-1 1-4 6-4 6 3 6 4-1 1-1 1H1zm5-6a3 3 0 100-6 3 3 0 000 6zm5-.5a.5.5 0 01.5-.5h4a.5.5 0 010 1h-4a.5.5 0 01-.5-.5z" clip-rule="evenodd"/>
                                </svg>

                            </div>
                        </div>
                        <input type="text" name="minimo_vagas_evento" class="form-control" id="exampleFormControlInput1" value="{{$evento->minimo_vagas_evento}}">
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
                        <input type="text" name="valor_evento" class="form-control money" id="exampleFormControlInput1" value="{{$evento->valor_evento}}">
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
                        <input type="text" name="max_parcela" class="form-control" id="exampleFormControlInput1" value="{{$evento->max_parcela}}">
                    </div>
                </div>
                
            </div>
            <hr class="mb-4">

            <div class="form-row">
                <button class="btn btn-primary btn-lg" type="submit">Alterar</button>         
            </div>

            

        </form>
    </div>

    <script type="text/javascript">
        $('.datepicker').datepicker({
            format: 'dd/mm/yyyy',
            language: 'pt-BR',
            
        });
    </script>

    <script type="text/javascript">
        $(document).ready(function(){
            $('.date').mask('00/00/0000');
            $('.time').mask('00:00');
            $('.date_time').mask('00/00/0000 00:00:00');
            $('.cep').mask('00000-000');
            $('.phone').mask('0000-0000');
            $('.phone_with_ddd').mask('(00) 0000-0000');
            $('.phone_us').mask('(000) 000-0000');
            $('.mixed').mask('AAA 000-S0S');
            $('.cpf').mask('000.000.000-00', {reverse: true});
            $('.cnpj').mask('00.000.000/0000-00', {reverse: true});
            $('.money').mask('000.000.000.000.000,00', {reverse: true});
            $('.money2').mask("#.##0,00", {reverse: true});
            $('.ip_address').mask('0ZZ.0ZZ.0ZZ.0ZZ', {
                translation: {
                'Z': {
                    pattern: /[0-9]/, optional: true
                }
                }
            });
            $('.ip_address').mask('099.099.099.099');
            $('.percent').mask('##0,00%', {reverse: true});
            $('.clear-if-not-match').mask("00/00/0000", {clearIfNotMatch: true});
            $('.placeholder').mask("00/00/0000", {placeholder: "__/__/____"});
            $('.fallback').mask("00r00r0000", {
                translation: {
                    'r': {
                    pattern: /[\/]/,
                    fallback: '/'
                    },
                    placeholder: "__/__/____"
                }
                });
            $('.selectonfocus').mask("00/00/0000", {selectOnFocus: true});
        });

    </script>
    @endsection