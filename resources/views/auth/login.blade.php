@extends('layouts.home-base')

@section('head-extra')
    <script>
        function envia() {
            $.ajax({
                url: 'http://localhost:8000/public/oauth/token',
                type: 'post',

                data:{
                    'grant_type':'password',
                    'client_id':'2',
                    'client_secret':'FDTvNfN1oZDkzcLDyBs5lrn0vHpdmLScOtUeS7jz',
                    'username':'admin@gmail.com',
                    'password':'123456'
                },
                success:function (data) {
                    window.localStorage.setItem('token', data.acceess_token);
                    window.localStorage.setItem('refresh_token', data.refresh_token);
                }
            });
        }
    </script>
@endsection
@section('content')
<body class="login-page">
    <div class="login-box">
       @include('auth.includes.logo')
        <div class="card">
            <div class="body">
                <form id="sign_in" method="POST" action="{{ route('login') }}">
                    @csrf
                    <div class="msg">Entre para iniciar sua sessão</div>
                    <div class="input-group">
                        <span class="input-group-addon">
                            <i class="material-icons">person</i>
                        </span>
                        <div class="form-line">
                            <input type="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ old('email') }}" placeholder="Email" required autofocus>
                        </div>
                        @if ($errors->has('email'))
                            <span class="invalid-feedback">
                                <strong>{{ $errors->first('email') }}</strong>
                            </span>
                        @endif
                    </div>
                    <div class="input-group">
                        <span class="input-group-addon">
                            <i class="material-icons">lock</i>
                        </span>
                        <div class="form-line">
                            <input type="password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password" placeholder="Senha" required>
                        </div>
                        @if ($errors->has('password'))
                            <span class="invalid-feedback">
                                <strong>{{ $errors->first('password') }}</strong>
                            </span>
                        @endif
                    </div>
                    <div class="row">
                        <div class="col-xs-8 p-t-5">
                            <input type="checkbox" name="rememberme" {{ old('remember') ? 'checked' : '' }} id="rememberme" class="filled-in chk-col-pink">
                            <label for="rememberme">Lembre-me</label>
                        </div>
                        <div class="col-xs-4">
                            <button class="btn btn-block bg-pink waves-effect" type="submit">ENTRAR</button>
                        </div>
                    </div>
                    <div class="row m-t-15 m-b--20">
                        <div class="col-xs-12">
                            <a class="btn btn-block btn-default waves-effect"
                                    href="{{url('/login/google')}}">
                                LOGIN COM GOOGLE
                                <img src="{{asset('images/google.png')}}" width="20px" height="20px">
                            </a>
                        </div>
                    </div>
                    <div class="row m-t-15 m-b--20">
                        <div class="col-xs-6">
                            <a href="{{ route('register') }}">Cadastre-se!</a>
                        </div>
                        <div class="col-xs-6 align-right">
                            <a href="{{ route('password.request') }}">Esqueceu sua senha?</a>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection

@section('footer-extra')
    <script>

    </script>
    <script src="{{ asset('js/pages/examples/sign-in.js') }}"></script>
@endsection
