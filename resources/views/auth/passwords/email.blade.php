@extends('layouts.home-base')
@section('content')
<body class="fp-page">
    <div class="fp-box">
        <div class="logo">
            <a href="javascript:void(0);">Admin<b>BSB</b></a>
            <small>Admin BootStrap Based - Material Design</small>
        </div>
        <div class="card">
            <div class="body">
                <form id="forgot_password" action="{{ route('password.email') }}" method="POST">
                    @csrf
                    <div class="msg">
                        Digite o endereço de email que você usou para se cadastrar. Enviaremos um e-mail com um link para redefinir sua senha.
                    </div>
                    <div class="input-group">
                        <span class="input-group-addon">
                            <i class="material-icons">email</i>
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

                    <button class="btn btn-block btn-lg bg-pink waves-effect" type="submit">ENVIAR LINK PARA REDEFINIR SENHA</button>

                    <div class="row m-t-20 m-b--5 align-center">
                        <a href="{{ route('login') }}">Entrar!</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection

@section('footer-extra')
<script src="{{ asset('js/pages/examples/forgot-password.js') }}"></script>
@endsection
