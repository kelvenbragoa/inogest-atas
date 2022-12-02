@extends('layouts.master')
@section('content')
        

<section class="section-base">
    <div class="container">
       
        <div class="row">
            <div class="col-lg-8">
                <div class="title">
                    <h2>Login</h2>
                    <p>Entre com sua conta</p>
                </div>
               
                    <form method="POST" class="form-box" action="{{ route('login') }}">
                        @csrf
                    <div class="row">
                        
                        <div class="col-lg-6">
                           
                            <input id="email"  name="email" value="{{ old('email') }}" placeholder="Email" type="email" class="input-text" required>
                            @error('email')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>
                    <div class="row">
                       
                        <div class="col-lg-6">
                            
                            <input id="email" type="password"  placeholder="Palavra passe"  name="password" class="input-text" required>
                            @error('password')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>
                   
                    <div class="form-checkbox">
                        <input type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>
                        <label for="check"> {{ __('Remember Me') }}</label>
                    </div>
                    <div class="form-checkbox">
                        @if (Route::has('password.request'))
                        <a  href="{{ route('password.request') }}">
                            Esqueceu palavra passe?
                        </a>
                    @endif
                    </div>
                   
                    <button class="btn btn-xs" type="submit">Entrar</button>
                   
                </form>
            </div>

            
            <div class="col-lg-4">
                <hr class="space visible-md" />
                <div class="title">
                    <a href="{{route('register')}}"><h2>Registre aqui</h2></a>
                    <p>Não possui uma conta?</p>
                </div>
              
            </div>
        </div>
    </div>
</section>
        
   
@endsection