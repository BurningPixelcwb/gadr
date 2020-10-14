@extends('master.layout_page')

@section('content')

<div class="card bg-light mb-3 shadow-sm">
    <div class="card-header align-center">
        <h2 class="card-title">Criar usuários</h2>
        <p class="lead">Nesta sessão, você pode criar novos usuários.</p>
    </div>


    <div class="card-body">

        
        <form action="{{route('user.store')}}" method="post" class="mt-4" autocomplete="off">
            @csrf
            @method('post')

            <h4 class="mb-3">Informações Pessoais</h4>

            <div class="form-row">
                <div class="form-group col-md-2">
                    <label for="viagem">Nome</label>
                    <div class="input-group mb-2">
                        <input type="text" class="form-control" name="name" id="name" placeholder="Primeiro nome" maxlength="20">
                        
                    </div>
                    
                </div>

                <div class="form-group col-md-4">
                    <label for="viagem">Sobrenome</label>
                    <div class="input-group mb-2">
                        <input type="text" class="form-control" name="sobrenome" id="sobrenome" placeholder="Sobrenome" maxlength="100">
                    </div>
                    
                </div>

                <div class="form-group col-md-2">
                    <label for="viagem">Nascimento</label>
                    <div class="input-group mb-2">
                        <input type="text" class="form-control datepicker date" name="nascimento" id="nascimento" placeholder="12/06/1991">
                    </div>
                    
                </div>

                <div class="form-group col-md-2">
                    <label for="viagem">RG</label>
                    <div class="input-group mb-2">
                        <input type="text" class="form-control rg" name="rg" id="rg">
                    </div>
                    
                </div>

                <div class="form-group col-md-2">
                    <label for="viagem">CPF</label>
                    <div class="input-group mb-2">
                        <input type="text" class="form-control cpf" name="cpf" id="cpf">
                    </div>
                    
                </div>

                <div class="form-group col-md-2">
                    <label for="viagem">Telefone 1</label>
                    <div class="input-group mb-2">
                        <input type="text" class="form-control phone_with_ddd" id="telefone_1" placeholder="Telefone 1" name="telefone_1">
                
                    </div>
                </div>

                <div class="form-group col-md-2">
                    <label for="viagem">Telefone 2</label>
                    <div class="input-group mb-2">
                        <input type="text" class="form-control phone_with_ddd" id="telefone_2" placeholder="telefone 2" name="telefone_2">
                
                    </div>
                </div>

                <div class="form-group col-md-2">
                    <label for="viagem">Sexo</label>
                    <div class="input-group mb-2">

                        <select id="sexo" name="sexo" class="form-control">
                            <option selected>Escolher...</option>
                            <option value="">Masculino</option>
                            <option value="">Feminino</option>
                            <option value="">Outros</option>
                        </select>
                
                    </div>
                </div>

            </div>

            <h4 class="mb-3">Informações do Sistema</h4>
            <div class="form-row">
                <div class="form-group col-md-4">
                    <label for="viagem">Email</label>
                    <div class="input-group mb-2">
                        <input type="email" class="form-control" id="email" placeholder="Insira o email" name="email" value="{{ old('email') }}">
                
                    </div>
                </div>

                <div class="form-group col-md-2">
                    <label for="viagem">Senha</label>
                    <div class="input-group mb-2">
                        <input type="password" class="form-control" id="password" placeholder="Insira o password" name="password" value="">
                
                    </div>
                </div>
                
            </div>

            <h4 class="mb-3">Informações de Endereço</h4>
            <div class="form-row">
                <div class="form-group col-md-2">
                    <label for="viagem">CEP</label>
                    <div class="input-group mb-2">
                        <input type="text" class="form-control cep" id="cep" placeholder="CEP" name="cep" value="">
                
                    </div>
                </div>
                <div class="form-group col-md-4">
                    <label for="viagem">Logradouro</label>
                    <div class="input-group mb-2">
                        <input type="text" class="form-control" id="logradouro" placeholder="Nome da rua" name="logradouro" value="">
                
                    </div>
                </div>
                <div class="form-group col-md-1">
                    <label for="viagem">Nº</label>
                    <div class="input-group mb-2">
                        <input type="text" class="form-control" id="numero" placeholder="Número da casa" name="numero" value="">
                
                    </div>
                </div>
                <div class="form-group col-md-5">
                    <label for="viagem">Complemento</label>
                    <div class="input-group mb-2">
                        <input type="text" class="form-control" id="complemento" placeholder="Insira o complemento" name="complemento" value="">
                
                    </div>
                </div>
                <div class="form-group col-md-4">
                    <label for="viagem">Bairro</label>
                    <div class="input-group mb-2">
                        <input type="text" class="form-control" id="bairro" placeholder="Insira o bairro" name="bairro" value="">
                
                    </div>
                </div>
                <div class="form-group col-md-4">
                    <label for="viagem">Cidade</label>
                    <div class="input-group mb-2">
                        <input type="text" class="form-control" id="cidade" placeholder="Insira o cidade" name="cidade" value="">
                
                    </div>
                </div>
                <div class="form-group col-md-2">
                    <label for="viagem">Estado</label>
                    <div class="input-group mb-2">
                        <input type="text" class="form-control" id="estado" placeholder="Insira o estado" name="estado" value="">
                
                    </div>
                </div>
                <div class="form-group col-md-2">
                    <label for="viagem">País</label>
                    <div class="input-group mb-2">
                        <input type="text" class="form-control" id="pais" placeholder="Insira o país" name="pais" value="">
                
                    </div>
                </div>
            </div>

            <div class="form-row">
                <div class="form-group col-md-4 center">
                    <button type="submit" class="btn btn-block btn-success">Cadastrar Novo Usuário</button>
                </div>
            </div>

        </form>

    </div>

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
            $('.phone_with_ddd').mask('(00) 0 0000-0000');
            $('.phone_us').mask('(000) 000-0000');
            $('.mixed').mask('AAA 000-S0S');
            $('.cpf').mask('000.000.000-00', {reverse: true});
            $('.cnpj').mask('00.000.000/0000-00', {reverse: true});
            $('.rg').mask('00.000.000-0', {reverse: true});
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
