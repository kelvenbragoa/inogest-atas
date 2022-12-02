@extends('layouts.master')
@section('content')
        

<section class="section-base">
    <div class="container">
       
        <div class="row">
            <div class="col-lg-8">
                <div class="title">
                    <h2>Verificar conta</h2>
                    <p>Verificar conta</p>
                </div>


                @if (session('resent'))
                        <div class="alert alert-success" role="alert">
                            {{ __('A fresh verification link has been sent to your email address.') }}
                        </div>
                    @endif

                    {{ __('Before proceeding, please check your email for a verification link.') }}
                    {{ __('If you did not receive the email') }},

                    <form class="form-box" method="POST" action="{{ route('verification.resend') }}">
                        @csrf
               
                   
                    <button class="btn btn-xs" type="submit">{{ __('click here to request another') }}</button>
                   
                </form>
            </div>

            
            <div class="col-lg-4">
                <hr class="space visible-md" />
                <div class="title">
                    <a href="{{route('register')}}"><h2>Faça login</h2></a>
                    <p>Tem uma conta?</p>
                </div>
              
            </div>
        </div>
    </div>
</section>
        
   
@endsection