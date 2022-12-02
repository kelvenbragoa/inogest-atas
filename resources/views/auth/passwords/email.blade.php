@extends('layouts.master')
@section('content')
        
<section class="section-base">
    <div class="container">
       
        <div class="row">
            <div class="col-lg-8">
                <div class="title">
                    <h2>Repor palavra passe</h2>
                    <p>Repor palavra passe</p>
                </div>

                @if (session('status'))
                    <div class="alert alert-success" role="alert">
                        {{ session('status') }}
                    </div>
                @endif
               
                    <form method="POST" class="form-box"  action="{{ route('password.email') }}">
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
                  
                    
                   
                    <button class="btn btn-xs" type="submit">Enviar link para repor palavra passe</button>
                   
                </form>
            </div>

            <div class="col-lg-4">
                <hr class="space visible-md" />
                <div class="title">
                    <a href="{{route('login')}}"><h2>Faça o login</h2></a>
                    <p>Já possui uma conta?</p>
                </div>
              
            </div>

            
           
        </div>
    </div>
</section>
        


   
@endsection