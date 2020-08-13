@extends('master.login')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
        <img class="mb-4" src="{{asset('imagens')}}/lgo-deniel.jpg" alt="" width="72" height="72">

        <form class="form-signin" method="POST" action="{{ route('login') }}">

        @csrf
            <img class="mb-4" src="/docs/4.5/assets/brand/bootstrap-solid.svg" alt="" width="72" height="72">
            
            <h1 class="h3 mb-3 font-weight-normal">Realizar login</h1>
            <label for="inputEmail" class="sr-only">Email address</label>
            
            <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>

            

            
            <label for="inputPassword" class="sr-only">Password</label>
            <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">


            
            <div class="checkbox mb-3">
                <label>
                <input type="checkbox" value="remember-me"> Lembre-se de mim
                </label>
            </div>
            <button class="btn btn-lg btn-primary btn-block" type="submit">Entrar</button>
            <p class="mt-5 mb-3 text-muted">&copy; 2017-2020</p>
        </form>

                </div>
          
</div>
@endsection
