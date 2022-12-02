@extends('layout_auth.master')
@section('content')
        
<div class="form-holder">
    <div class="menu-holder">
        <ul class="main-links">
            <li><a class="normal-link" href="{{ route('login') }}">Já tem uma conta?</a></li>
            <li><a class="sign-button" href="{{ route('login') }}">Entrar</a></li>
        </ul>
    </div>
    <div class="signin-signup-form">
        <div class="form-items">
            <div class="form-title">Se registre para uma conta organizacional</div>
            <form method="POST" action="{{ route('register') }}">
                @csrf
                <div class="row">
                    <div class="col-md-6 form-text">
                        <input type="text" name="name" placeholder="Nome" required autocomplete="name" autofocus>
                        @error('name')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                    </div>
                    <div class="col-md-6 form-text">
                        <input type="text" name="mobile" placeholder="Telefone" required autocomplete="mobile" autofocus>
                        @error('mobile')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                        @enderror
                    </div>
                </div>
                <div class="form-text">
                    <input type="text" name="email" placeholder="Email" value="{{ old('email') }}" required autocomplete="email">
                    @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                    @enderror
                </div>
                <div class="form-text">
                    <input type="password" name="password" placeholder="Password" required autocomplete="new-password">
                    @error('password')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
                <div class="form-text">
                    <input type="password" name="password_confirmation" placeholder="Confirmar Password" required autocomplete="new-password">
                </div>
                <div class="form-text text-holder">
                    <span class="text-only">Aceita os termos e condições?</span>
                    <input type="radio" name="terms" class="hno-radiobtn" id="rad1" checked><label for="rad1">Sim</label>
                    
                </div>
                <div class="form-button">
                    <button id="submit" type="submit" class="ybtn ybtn-accent-color">Criar nova conta</button>
                </div>
            </form>
        </div>
    </div>
</div>
   
@endsection