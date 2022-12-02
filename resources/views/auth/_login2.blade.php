@extends('layout_auth.master')
@section('content')
        
        <div class="form-holder">
            <div class="menu-holder">
                <ul class="main-links">
                    <li><a class="normal-link" href="{{ route('register') }}">Não tem uma conta?</a></li>
                    <li><a class="sign-button" href="{{ route('register') }}">Registre</a></li>
                </ul>
            </div>
            <div class="signin-signup-form">
                <div class="form-items">
                    <div class="form-title">Entre com sua conta</div>
                    <form method="POST" action="{{ route('login') }}">
                        @csrf
                        <div class="form-text">
                            <input type="email"  name="email" value="{{ old('email') }}" placeholder="Endereço email" required>
                            @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                        </div>
                        <div class="form-text">
                            <input type="password" name="password" placeholder="Palavra passe"  name="password" required>
                            @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                        </div>
                        <div class="form-text">
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>

                                <label class="form-check-label" for="remember">
                                    {{ __('Remember Me') }}
                                </label>
                            </div>
                        </div>

                        
                        <div class="form-text">

                                @if (Route::has('password.request'))
                                    <a class="btn btn-link" href="{{ route('password.request') }}">
                                        Esqueceu palavra passe?
                                    </a>
                                @endif
                            </div>
                       
                        <div class="form-button">
                            <button id="submit" type="submit" class="ybtn ybtn-accent-color">Entrar</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
   
@endsection