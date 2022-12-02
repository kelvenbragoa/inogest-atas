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
               
                    <form method="POST" class="form-box"  action="{{ route('password.update') }}">
                        @csrf
                    <div class="row">
                        
                        <div class="col-lg-6">
                           
                            <input id="email"  name="email" value="{{ $email ?? old('email') }}" placeholder="Email" type="email" class="input-text" required>
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
                   
                    <div class="row">
                       
                        <div class="col-lg-6">
                            
                            <input id="email" type="password"  placeholder="Palavra passe" name="password_confirmation" class="input-text" required>
                            @error('password')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>
                   
                    
                   
                    <button class="btn btn-xs" type="submit">Repor palavra passe</button>
                   
                </form>
            </div>

            
           
        </div>
    </div>
</section>
        
   
@endsection