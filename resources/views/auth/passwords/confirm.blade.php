@extends('layouts.master')
@section('content')
        
<section class="section-base">
    <div class="container">
       
        <div class="row">
            <div class="col-lg-8">
                <div class="title">
                    <h2>Palavra passe</h2>
                    <p>Por favor confirme a sua palavra passe antes de continuar</p>
                </div>

                @if (session('status'))
                <div class="alert alert-success" role="alert">
                    {{ session('status') }}
                </div>
    @endif
               
                    <form method="POST" class="form-box" action="{{ route('password.confirm') }}">
                        @csrf
                   
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
                   
                   
                   
                   
                    <button class="btn btn-xs" type="submit">Confirmar palavra passe</button>
                   
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