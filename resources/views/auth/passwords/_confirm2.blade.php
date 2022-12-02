@extends('layout_auth.master')
@section('content')
        
        <div class="form-holder">
           
            @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
            @endif
           

            <div class="signin-signup-form">
                <div class="form-items">
                    <div class="form-title">Por favor confirme a sua palavra passe antes de continuar</div>
                    <form method="POST" action="{{ route('password.confirm') }}">
                        @csrf
                        <div class="form-text">
                            <input type="password"  name="password"  placeholder="Palavra passe" required>
                            @error('password')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>

                        
                       

                        
                        
                       
                        <div class="form-button">
                            <button id="submit" type="submit" class="ybtn ybtn-accent-color">Confirmar palavra passe</button>
                        </div>
                        <div class="form-text">

                            @if (Route::has('password.request'))
                                <a class="btn btn-link" href="{{ route('password.request') }}">
                                    Esqueceu palavra passe?
                                </a>
                            @endif
                        </div>
                    </form>
                </div>
            </div>
        </div>
   
@endsection