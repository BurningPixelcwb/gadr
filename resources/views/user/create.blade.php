@extends('master.layout_page')

@section('content')

<div class="card bg-light mb-3 shadow-sm">
    <div class="card-header align-center">
        <h2 class="card-title">Criar usuários</h2>
        <p class="lead">Nesta sessão, você pode criar novos usuários.</p>
    </div>


    <div class="card-body">

        <form method="post" enctype="multipart/form-data" action="{{ route('eventos.store') }}">
            @csrf
            @method('post')

            <h4 class="mb-3">Informações Pessoais</h4>

            <div class="form-row">
                <div class="form-group col-md-2">
                    <label for="viagem">Nome</label>
                    <div class="input-group mb-2">
                        <input type="text" class="form-control time" name="hora_ida_evento" id="time" maxlength="5">
                    </div>
                    
                </div>

                <div class="form-group col-md-4">
                    <label for="viagem">Sobrenome</label>
                    <div class="input-group mb-2">
                        <input type="text" class="form-control time" name="hora_ida_evento" id="time" maxlength="105">
                    </div>
                    
                </div>

                <div class="form-group col-md-2">
                    <label for="viagem">Nascimento</label>
                    <div class="input-group mb-2">
                        <input type="text" class="form-control time" name="hora_ida_evento" id="time" maxlength="105">
                    </div>
                    
                </div>

                <div class="form-group col-md-2">
                    <label for="viagem">RG</label>
                    <div class="input-group mb-2">
                        <input type="text" class="form-control time" name="hora_ida_evento" id="time" maxlength="105">
                    </div>
                    
                </div>

                <div class="form-group col-md-2">
                    <label for="viagem">CPF</label>
                    <div class="input-group mb-2">
                        <input type="text" class="form-control time" name="hora_ida_evento" id="time" maxlength="105">
                    </div>
                    
                </div>

                <div class="form-group col-md-2">
                    <label for="viagem">Telefone 1</label>
                    <div class="input-group mb-2">
                        <input type="email" class="form-control" id="email" placeholder="Insira o email" name="email" value="{{ old('email') }}">
                
                    </div>
                </div>

                <div class="form-group col-md-2">
                    <label for="viagem">Telefone 2</label>
                    <div class="input-group mb-2">
                        <input type="email" class="form-control" id="email" placeholder="Insira o email" name="email" value="{{ old('email') }}">
                
                    </div>
                </div>

                <div class="form-group col-md-2">
                    <label for="viagem">Sexo</label>
                    <div class="input-group mb-2">
                        <input type="email" class="form-control" id="email" placeholder="Insira o email" name="email" value="{{ old('email') }}">
                
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
                        <input type="email" class="form-control" id="email" placeholder="Insira o email" name="email" value="{{ old('email') }}">
                
                    </div>
                </div>
                <div class="form-group col-md-4">
                    <label for="viagem">Logradouro</label>
                    <div class="input-group mb-2">
                        <input type="email" class="form-control" id="email" placeholder="Insira o email" name="email" value="{{ old('email') }}">
                
                    </div>
                </div>
                <div class="form-group col-md-1">
                    <label for="viagem">Nº</label>
                    <div class="input-group mb-2">
                        <input type="email" class="form-control" id="email" placeholder="Insira o email" name="email" value="{{ old('email') }}">
                
                    </div>
                </div>
                <div class="form-group col-md-5">
                    <label for="viagem">Complemento</label>
                    <div class="input-group mb-2">
                        <input type="email" class="form-control" id="email" placeholder="Insira o email" name="email" value="{{ old('email') }}">
                
                    </div>
                </div>
                <div class="form-group col-md-4">
                    <label for="viagem">Bairro</label>
                    <div class="input-group mb-2">
                        <input type="email" class="form-control" id="email" placeholder="Insira o email" name="email" value="{{ old('email') }}">
                
                    </div>
                </div>
                <div class="form-group col-md-4">
                    <label for="viagem">Cidade</label>
                    <div class="input-group mb-2">
                        <input type="email" class="form-control" id="email" placeholder="Insira o email" name="email" value="{{ old('email') }}">
                
                    </div>
                </div>
                <div class="form-group col-md-2">
                    <label for="viagem">Estado</label>
                    <div class="input-group mb-2">
                        <input type="email" class="form-control" id="email" placeholder="Insira o email" name="email" value="{{ old('email') }}">
                
                    </div>
                </div>
                <div class="form-group col-md-2">
                    <label for="viagem">País</label>
                    <div class="input-group mb-2">
                        <input type="email" class="form-control" id="email" placeholder="Insira o email" name="email" value="{{ old('email') }}">
                
                    </div>
                </div>
            </div>
            

        </form>

    </div>

</div>



    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Dashboard</div>

                    <div class="card-body">

                        <a class="text-success" href="{{ route('user.index') }}">&leftarrow; Voltar para a listagem</a>

                        @if($errors)
                            @foreach($errors->all() as $error)
                                <div class="alert alert-danger mt-4" role="alert">
                                    {{ $error }}
                                </div>
                            @endforeach
                        @endif

                        <form action="{{route('user.store')}}" method="post" class="mt-4" autocomplete="off">
                            @csrf

                            <div class="form-group">
                                <label for="name">Nome do Usuário</label>
                                <input type="text" class="form-control" id="name" placeholder="Insira o nome completo do usuário"
                                       name="name" value="{{ old('name') }}">
                            </div>

                            <div class="form-group">
                                <label for="name">Email</label>
                                <input type="email" class="form-control" id="email" placeholder="Insira o email"
                                       name="email" value="{{ old('email') }}">
                            </div>

                            <div class="form-group">
                                <label for="name">Senha</label>
                                <input type="password" class="form-control" id="password" placeholder="Insira o password" name="password" value="">
                            </div>

                            <button type="submit" class="btn btn-block btn-success">Cadastrar Novo Usuário</button>
                        </form>
                    </div>

                </div>
            </div>
        </div>
    </div>
@endsection
