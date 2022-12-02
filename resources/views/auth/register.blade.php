@extends('layouts.master')
@section('content')
        

<section class="section-base">
    <div class="container">
       
        <div class="row">
            <div class="col-lg-8">
                <div class="title">
                    <h2>Registrar</h2>
                    <p>Registrar a sua organização</p>
                </div>


                
               
                <form method="POST" action="{{ route('register') }}">
                    @csrf
                    <div class="row">
                        
                        <div class="col-lg-6">
                           
                            <input id="name"  name="name" value="{{ old('name') }}" placeholder="Nome" type="text" class="input-text" required>
                            @error('name')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="col-lg-6">
                           
                            <input id="mobile"  name="mobile" value="{{ old('mobile') }}" placeholder="Telefone" type="number" class="input-text" required>
                            @error('mobile')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>
                    <div class="row">
                       
                        <div class="col-lg-12">
                            
                            <input id="email" type="email"  placeholder="Email"  name="email" class="input-text" required>
                            @error('email')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>
                    <div class="row">
                       
                        <div class="col-lg-12">
                            
                            <input id="password" type="password"  placeholder="Palavra passe"  name="password" class="input-text" required>
                            @error('password')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>
                    <div class="row">
                       
                        <div class="col-lg-12">
                            
                            <input id="password_confirmation" type="password"  placeholder="Confirmar palavra passe"  name="password_confirmation" class="input-text" required>
                            @error('password_confirmation')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>
                   
                    <div class="form-checkbox">
                        <input type="radio" name="remember" id="remember" checked required>
                        <label for="check"> Aceita os termos e condiçoes?</label>
                    </div>
                   
                   
                    <button class="btn btn-xs" type="submit">Registrar</button>
                   
                </form>
            </div>

            
            <div class="col-lg-4">
                <hr class="space visible-md" />
                <div class="title">
                    <a href="{{route('login')}}"><h2>Faça o login</h2></a>
                    <p>Já tem uma conta?</p>
                </div>
              
            </div>
        </div>
    </div>
</section>
        
   
@endsection