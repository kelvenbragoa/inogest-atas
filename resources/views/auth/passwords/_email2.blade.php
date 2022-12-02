@extends('layout_auth.master')
@section('content')
        
        <div class="form-holder">
            <div class="menu-holder">
                <ul class="main-links">
                    <li><a class="normal-link" href="{{ route('login') }}">Já tem uma conta?</a></li>
                    <li><a class="sign-button" href="{{ route('login') }}">Login</a></li>
                </ul>
            </div>
            @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
            @endif
           

            <div class="signin-signup-form">
                <div class="form-items">
                    <div class="form-title">Repor palavra passe</div>
                    <form method="POST" action="{{ route('password.email') }}">
                        @csrf
                        <div class="form-text">
                            <input type="email"  name="email" value="{{ old('email') }}" placeholder="Endereço email" required>
                            @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                        </div>
                       
                       

                        
                        
                       
                        <div class="form-button">
                            <button id="submit" type="submit" class="ybtn ybtn-accent-color">Enviar link para repor palavra passe</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
   
@endsection