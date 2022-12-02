@extends('layout_auth.master')
@section('content')
        
        <div class="form-holder">
           
            <div class="signin-signup-form">
                <div class="form-items">
                    <div class="form-title">Entre com sua conta</div>
                    <form method="POST" action="{{ route('password.update') }}">
                        @csrf

                        <input type="hidden" name="token" value="{{ $token }}">

                        <div class="form-text">
                            <input type="email"  name="email" value="{{ $email ?? old('email') }}" placeholder="Endereço email" required>
                            @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                        </div>
                        <div class="form-text">
                            <input type="password" name="password" placeholder="Palavra passe"  name="password" autocomplete="new-password" required>
                            @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                        </div>

                        <div class="form-text">
                            <input type="password" name="password_confirmation" placeholder="Confirmar Palavra passe"  name="password" autocomplete="new-password" required>
                            @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                        </div>
                       

                        
                       
                       
                        <div class="form-button">
                            <button id="submit" type="submit" class="ybtn ybtn-accent-color">Repor palavra passe</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
   
@endsection