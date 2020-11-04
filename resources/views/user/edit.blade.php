@extends('master.layout_page')

@section('content')


<div class="card bg-light mb-3 shadow-sm">
    <div class="card-header align-center">
        <h2 class="card-title">Criar usuários</h2>
        <p class="lead">Nesta sessão, você pode criar novos usuários.</p>
    </div>


    <div class="card-body">

        <form action="{{route('user.update', ['user' => $user->id])}}" method="post" class="mt-4" autocomplete="off">
            @csrf
            @method('PUT')

            <h4 class="mb-3">Informações Pessoais</h4>

            <div class="form-row">
                <div class="form-group col-md-2">
                    <label for="name">Nome</label>
                    <div class="input-group mb-2">
                        <input type="text" class="form-control" name="name" id="name" placeholder="Primeiro nome" maxlength="20" value="{{ old('name') ?? $user->name }}">
                        
                        @error('name')
                            <div class="alert alert-danger"><p>{{ $message }}</p></div>
                        @enderror

                    </div>
                    
                </div>

                <div class="form-group col-md-4">
                    <label for="sobrenome">Sobrenome</label>
                    <div class="input-group mb-2">
                        <input type="text" class="form-control" name="sobrenome" id="sobrenome" placeholder="Sobrenome" maxlength="100" value="{{ old('sobrenome') ?? $user->sobrenome  }}">

                        @error('sobrenome')
                            <div class="alert alert-danger">{{ $message }}</div>
                        @enderror

                    </div>
                    
                </div>

                <div class="form-group col-md-2">
                    <label for="nascimento">Nascimento</label>
                    <div class="input-group mb-2">
                        <input type="text" class="form-control datepicker date" name="nascimento" id="nascimento" placeholder="12/06/1991" value="{{ old('nascimento') ?? $user->nascimento }}">
                        
                        @error('nascimento')
                            <div class="alert alert-danger">{{ $message }}</div>
                        @enderror

                    </div>
                    
                </div>

                <div class="form-group col-md-2">
                    <label for="rg">RG</label>
                    <div class="input-group mb-2">
                        <input type="text" class="form-control rg" name="rg" id="rg" value="{{ old('rg') ?? $user->rg }}">
                                  
                        @error('rg')
                            <div class="alert alert-danger">{{ $message }}</div>
                        @enderror

                    </div>
                    
                </div>

                <div class="form-group col-md-2">
                    <label for="cpf">CPF</label>
                    <div class="input-group mb-2">
                        <input type="text" class="form-control cpf" name="cpf" id="cpf" value="{{ old('cpf') ?? $user->cpf }}">
                                  
                        @error('nascimento')
                            <div class="alert alert-danger">{{ $message }}</div>
                        @enderror

                    </div>
                    
                </div>

                <div class="form-group col-md-2">
                    <label for="telefone_1">Telefone 1</label>
                    <div class="input-group mb-2">
                        <input type="text" class="form-control phone_with_ddd" id="telefone_1" placeholder="Telefone 1" name="telefone_1" value="{{ old('telefone_1') ?? $user->telefone_1 }}">
                                  
                        @error('nascimento')
                            <div class="alert alert-danger">{{ $message }}</div>
                        @enderror

                
                    </div>
                </div>

                <div class="form-group col-md-2">
                    <label for="telefone_2">Telefone 2</label>
                    <div class="input-group mb-2">
                        <input type="text" class="form-control phone_with_ddd" id="telefone_2" placeholder="telefone 2" name="telefone_2" value="{{ old('telefone_2') ?? $user->telefone_2 }}">
                          
                        @error('nascimento')
                            <div class="alert alert-danger">{{ $message }}</div>
                        @enderror

                    </div>
                </div>

                <div class="form-group col-md-2">
                    <label for="sexo">Sexo</label>
                    <div class="input-group mb-2">

                        <select id="sexo" name="sexo" class="form-control">
                            <option >Escolher...</option>
                            <option @if($user->sexo == 'M') selected @endif value="M">Masculino</option>
                            <option @if($user->sexo == 'F') selected @endif value="F">Feminino</option>
                            <option @if($user->sexo == 'O') selected @endif value="O">Outros</option>
                        </select>
                          
                        @error('nascimento')
                            <div class="alert alert-danger">{{ $message }}</div>
                        @enderror

                    </div>
                </div>

            </div>

            <h4 class="mb-3">Informações do Sistema</h4>
            <div class="form-row">
                <div class="form-group col-md-4">
                    <label for="email">Email</label>
                    <div class="input-group mb-2">
                        <input type="email" class="form-control" id="email" placeholder="Insira o email" name="email" value="{{ old('email') ?? $user->email }}">
                          
                        @error('nascimento')
                            <div class="alert alert-danger">{{ $message }}</div>
                        @enderror

                    </div>
                </div>
            </div>

            <h4 class="mb-3">Informações de Endereço</h4>
            <div class="form-row">
                <div class="form-group col-md-2">
                    <label for="viagem">CEP</label>
                    <div class="input-group mb-2">
                        <input type="text" class="form-control cep" id="cep" placeholder="CEP" name="cep" value="{{ old('cep') ?? $user->cep }}">
                
                    </div>
                </div>
                <div class="form-group col-md-4">
                    <label for="viagem">Logradouro</label>
                    <div class="input-group mb-2">
                        <input type="text" class="form-control" id="logradouro" placeholder="Nome da rua" name="logradouro" value="{{ old('logradouro') ?? $user->logradouro }}">
                
                    </div>
                </div>
                <div class="form-group col-md-1">
                    <label for="viagem">Nº</label>
                    <div class="input-group mb-2">
                        <input type="text" class="form-control" id="numero" placeholder="Número da casa" name="numero" value="{{ old('numero') ?? $user->numero }}">
                
                    </div>
                </div>
                <div class="form-group col-md-5">
                    <label for="viagem">Complemento</label>
                    <div class="input-group mb-2">
                        <input type="text" class="form-control" id="complemento" placeholder="Insira o complemento" name="complemento" value="{{ old('complemento') ?? $user->complemento }}">
                
                    </div>
                </div>
                <div class="form-group col-md-4">
                    <label for="viagem">Bairro</label>
                    <div class="input-group mb-2">
                        <input type="text" class="form-control" id="bairro" placeholder="Insira o bairro" name="bairro" value="{{ old('bairro') ?? $user->bairro }}">
                
                    </div>
                </div>
                <div class="form-group col-md-4">
                    <label for="viagem">Cidade</label>
                    <div class="input-group mb-2">
                        <input type="text" class="form-control" id="cidade" placeholder="Insira o cidade" name="cidade" value="{{ old('cidade') ?? $user->cidade }}">
                
                    </div>
                </div>
                <div class="form-group col-md-2">
                    <label for="viagem">Estado</label>
                    <div class="input-group mb-2">
                        <input type="text" class="form-control" id="estado" placeholder="Insira o estado" name="estado" value="{{ old('estado') ?? $user->estado }}">
                
                    </div>
                </div>
                <div class="form-group col-md-2">
                    <label for="viagem">País</label>
                    <div class="input-group mb-2">
                        <input type="text" class="form-control" id="pais" placeholder="Insira o país" name="pais" value="{{ old('pais') ?? $user->pais }}">
                
                    </div>
                </div>
            </div>

            <div class="form-row">
                <div class="form-group col-md-4 center">
                    <button type="submit" class="btn btn-block btn-success">Editar Usuário</button>
                </div>
            </div>

        </form>

    </div>

</div>
    
@endsection