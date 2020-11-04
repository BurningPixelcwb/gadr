<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gestão de Aventuras Deniel Rocha</title>

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <link rel="stylesheet" href="{{url(mix('admin/css/style.css'))}}" >
    
    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
    <script type="text/javascript" src="http://code.jquery.com/qunit/qunit-1.11.0.js"></script>
    <script src="{{url(mix('admin/js/script.js'))}}"></script>

</head>
<body>

<nav class="navbar navbar-expand-md navbar-dark bg-dark fixed-top">
  <a class="navbar-brand" href="#">GADR - Deniel Rocha</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarsExampleDefault" aria-controls="navbarsExampleDefault" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarsExampleDefault">
    <ul class="navbar-nav mr-auto">
      @can('Realizar Venda')
      <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" id="dropdown01" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Vendas</a>
        <div class="dropdown-menu" aria-labelledby="dropdown01">
          <a class="dropdown-item" href="{{route('compras.index')}}">Fazer Venda</a>
          <a class="dropdown-item" href="{{route('compras.list')}}">Exibir Vendas</a>
        </div>
      </li>
      @endcan

      @can('Tratar Eventos')
      <li class="nav-item active">
        <a class="nav-link" href="{{route('eventos.index')}}">Eventos <span class="sr-only">(current)</span></a>
      </li>
      @endcan
      @can('Tratar Viagens')
      <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" id="dropdown01" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Tratar Viagens</a>
        <div class="dropdown-menu" aria-labelledby="dropdown01">
          <a class="dropdown-item" href="{{route('viagens.index')}}">Viagens</a>
          <a class="dropdown-item" href="{{route('sub_tipo.index')}}">Subtipo Viagem</a>
          <a class="dropdown-item" href="{{route('tipo_viagem.index')}}">Tipo Viagem</a>
        </div>
      </li>
      @endcan

      @can('Tratar Usuários')
      <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" id="dropdown01" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Tratar Usuários</a>
        <div class="dropdown-menu" aria-labelledby="dropdown01">
          <a class="dropdown-item" href="{{route('user.index')}}">Usuários</a>
          <a class="dropdown-item" href="{{route('role.index')}}">Papéis</a>
          <a class="dropdown-item" href="{{route('permission.index')}}">Permissões</a>
        </div>
      </li>
      @endcan

    </ul>
    <a href="{{ route('adm.logout')}}">Logout</a>
  </div>
</nav>

<main role="main" class="container">

    @yield('content')

</main><!-- /.container -->



</body>
  <nav class="pt-4 my-md-3 pt-md-3 border-top navbar navbar-expand-md navbar-dark">
    <main role="main" class="container">

  Deniel Rocha

  </main><!-- /.container -->
  </nav>
</html>