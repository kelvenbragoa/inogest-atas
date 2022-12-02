@extends('layouts.master')
@section('content')

        <section class="section-image section-home-one no-padding-y" >
            <div class="container">
                <div class="row">
                    <div class="col-lg-7">
                        <hr class="space-lg" />
                        <h3 class="text-color-2">
                            LOREM IPSUM LOREM IPSUM LOREM IPSUM LOREM IPSUM
                        </h3>
                        <ul class="slider" data-options="arrows:false,nav:false,autoplay:3000,controls:out">
                            <li>
                                <h1 class="text-uppercase">Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum</h1> 
                            </li>
                            <li>
                                <h1 class="text-uppercase">Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum</h1>
                            </li>
                            <li>
                                <h1 class="text-uppercase">Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum</h1>
                            </li>
                        </ul>
                        <p>
                            Lorem Ipsum Lorem Ipsum.  Duis aute irure dolor in reprehenderit
                            in voluptate velit esse cillum dolore eu fugiat nulla pariature irure dolore.
                        </p>
                        <hr class="space-sm" />
                        <a href="{{route('register')}}" class="btn btn-sm width-190 full-width-sm">Registrar</a>
                        <a href="{{route('login')}}" class="btn btn-border btn-sm width-190 active full-width-sm">Login</a>
                        <hr class="space-lg" />
                        <hr class="space-lg" />
                    </div>
                    <div class="col-lg-5 hidden-md">
                        <hr class="space-sm" />
                        <img data-anima="fade-bottom" data-time="1000" class="slide-image" src="http://via.placeholder.com/504x780" alt="" />
                    </div>
                </div>
            </div>
        </section>
        <section class="section-base section-overflow-top">
            <div class="container">
                <div class="grid-list" data-columns="4" data-columns-md="2" data-columns-sm="1">
                    <div class="grid-box">
                        <div class="grid-item">
                            <div class="cnt-box cnt-box-top-icon boxed">
                                <i class="im-monitor-phone"></i>
                                <div class="caption">
                                    <h2>Lorem Ipsum Lorem Ipsum</h2>
                                    <p>
                                        Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum.
                                    </p>
                                </div>
                            </div>
                        </div>
                        <div class="grid-item">
                            <div class="cnt-box cnt-box-top-icon boxed">
                                <i class="im-bar-chart2"></i>
                                <div class="caption">
                                    <h2>Lorem Ipsum Lorem Ipsum</h2>
                                    <p>
                                        Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum.
                                    </p>
                                </div>
                            </div>
                        </div>
                        <div class="grid-item">
                            <div class="cnt-box cnt-box-top-icon boxed">
                                <i class=" im-medal"></i>
                                <div class="caption">
                                    <h2>Lorem Ipsum Lorem Ipsum</h2>
                                    <p>
                                        Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum.
                                    </p>
                                </div>
                            </div>
                        </div>
                        <div class="grid-item">
                            <div class="cnt-box cnt-box-top-icon boxed">
                                <i class="im-business-man"></i>
                                <div class="caption">
                                    <h2>Lorem Ipsum Lorem Ipsum</h2>
                                    <p>
                                        Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum.
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row row-fit-lg" data-anima="fade-bottom" data-time="1000">
                    <div class="col-lg-6">
                        <ul class="slider" data-options="arrows:true,nav:false">
                            <li>
                                <a class="img-box img-box-caption btn-video lightbox" href="https://www.youtube.com/watch?v=Lb4IcGF5iTQ" data-lightbox-anima="fade-top">
                                    <img src="http://via.placeholder.com/800x500" alt="">
                                    <span>Inogest Atas</span>
                                </a>
                            </li>
                           
                        </ul>
                    </div>
                    <div class="col-lg-6">
                        <div class="title">
                            <h2>Nossa missão e visão</h2>
                            <p>Acerca de nós</p>
                        </div>
                        <p>
                            Lorem ipsum dolor sit amet consectetur adipiscing elitsed do eiusmod tempor incididunt utlabore et dolore magna aliqua.
                            Utenim ad minim veniam quis nostrud exercitation ullamco laboris.
                        </p>
                        
                    </div>
                </div>
            </div>
        </section>
        <section class="section-base section-color">
            <div class="container">
                <div class="row" data-anima="fade-bottom" data-time="1000">
                    <div class="col-lg-6">
                        <div class="title">
                            <h2>Lorem Ipsum Lorem Ipsum</h2>
                            <p>Nossos serviços</p>
                        </div>
                    </div>
                    
                </div>
                <hr class="space" />
                <div class="grid-list" data-columns="3" data-columns-md="2" data-columns-sm="1" data-anima="fade-bottom" data-time="1000">
                    <div class="grid-box">
                        <div class="grid-item">
                            <div class="cnt-box cnt-box-info boxed" data-href="#">
                                <a href="#" class="img-box"><img src="http://via.placeholder.com/800x500" alt="" /></a>
                                <div class="caption">
                                    <h2>Lorem Ipsum</h2>
                                   
                                    <p>
                                        Excepteur sint occaecat cupidatat non proidento in culpa qui officia deserunt mollit anim id est laborum.
                                    </p>
                                </div>
                            </div>
                        </div>
                        <div class="grid-item">
                            <div class="cnt-box cnt-box-info boxed" data-href="#">
                                <a href="#" class="img-box"><img src="http://via.placeholder.com/800x500" alt="" /></a>
                                <div class="caption">
                                    <h2>Lorem Ipsum</h2>
                                
                                    <p>
                                        Excepteur sint occaecat cupidatat non proidento in culpa qui officia deserunt mollit anim id est laborum.
                                    </p>
                                </div>
                            </div>
                        </div>
                        <div class="grid-item">
                            <div class="cnt-box cnt-box-info boxed" data-href="#">
                                <a href="#" class="img-box"><img src="http://via.placeholder.com/800x500" alt="" /></a>
                                <div class="caption">
                                    <h2>Lorem Ipsum</h2>
                                   
                                    <p>
                                        Excepteur sint occaecat cupidatat non proidento in culpa qui officia deserunt mollit anim id est laborum.
                                    </p>
                                </div>
                            </div>
                        </div>
                        <div class="grid-item">
                            <div class="cnt-box cnt-box-info boxed" data-href="#">
                                <a href="#" class="img-box"><img src="http://via.placeholder.com/800x500" alt="" /></a>
                                <div class="caption">
                                    <h2>Lorem Ipsum</h2>
                                
                                    <p>
                                        Excepteur sint occaecat cupidatat non proidento in culpa qui officia deserunt mollit anim id est laborum.
                                    </p>
                                </div>
                            </div>
                        </div>
                        <div class="grid-item">
                            <div class="cnt-box cnt-box-info boxed" data-href="#">
                               
                                <a href="#" class="img-box"><img src="http://via.placeholder.com/800x500" alt="" /></a>
                                <div class="caption">
                                    <h2>Lorem Ipsum</h2>
                                   
                                    <p>
                                        Excepteur sint occaecat cupidatat non proidento in culpa qui officia deserunt mollit anim id est laborum.
                                    </p>
                                </div>
                            </div>
                        </div>
                        <div class="grid-item">
                            <div class="cnt-box cnt-box-info boxed" data-href="#">
                                
                                <a href="#" class="img-box"><img src="http://via.placeholder.com/800x500" alt="" /></a>
                                <div class="caption">
                                    <h2>Lorem Ipsum</h2>
                                  
                                    <p>
                                        Excepteur sint occaecat cupidatat non proidento in culpa qui officia deserunt mollit anim id est laborum.
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
      
        <section class="section-base">
            <div class="container">
                <div class="row align-items-center" data-anima="fade-bottom" data-time="1000">
                    <div class="col-lg-6">
                        <div class="title">
                            <h2>Lorem Ipsum Lorem Ipsum</h2>
                            <p>Lorem Ipsum Lorem Ipsum</p>
                        </div>
                        <p>
                            Lorem Ipsum Lorem IpsumLorem Ipsum Lorem IpsumLorem Ipsum Lorem IpsumLorem Ipsum Lorem Ipsum
                            Lorem Ipsum Lorem IpsumLorem Ipsum Lorem Ipsum.
                        </p>
                        <hr class="space-sm" />
                        <ul class="accordion-list">
                            <li>
                                <a href="#">Lorem Ipsum Lorem Ipsum</a>
                                <div class="content">
                                    <p>
                                        Lorem ipsum dolor sit amet consectetur adipiscing elitsed do eiusmod tempor incididunt utlabore et dolore magna aliqua.
                                        Utenim ad minim veniam quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit
                                        in voluptate velit esse cillum dolore eu fugiat nulla pariatur.
                                    </p>
                                </div>
                            </li>

                            <li>
                                <a href="#">Lorem Ipsum Lorem Ipsum</a>
                                <div class="content">
                                    <p>
                                        Lorem ipsum dolor sit amet consectetur adipiscing elitsed do eiusmod tempor incididunt utlabore et dolore magna aliqua.
                                        Utenim ad minim veniam quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit
                                        in voluptate velit esse cillum dolore eu fugiat nulla pariatur.
                                    </p>
                                </div>
                            </li>
                            <li>
                                <a href="#">Lorem Ipsum Lorem Ipsum</a>
                                <div class="content">
                                    <p>
                                        Lorem ipsum dolor sit amet consectetur adipiscing elitsed do eiusmod tempor incididunt utlabore et dolore magna aliqua.
                                        Utenim ad minim veniam quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit
                                        in voluptate velit esse cillum dolore eu fugiat nulla pariatur.
                                    </p>
                                </div>
                            </li>
                        </ul>
                    </div>
                    <div class="col-lg-6">
                        <img src="http://via.placeholder.com/590x364" alt="" />
                    </div>
                </div>
            </div>
        </section>
        <section class="section-base section-color">
            <div class="container">
                <div class="row" data-anima="fade-bottom" data-timeline="asc" data-time="2000">
                    <div class="col-lg-4 anima">
                        <div class="cnt-box cnt-pricing-table">
                            <div class="top-area">
                                <h2>Báscio</h2>
                                <div class="price"><span>Grátis</span></div>
                                <p>Máximo 3 usuários</p>
                            </div>
                            <ul>
                                <li>Sempre que quiseres o básico, onde é permitido registrar até no máximo 3 funcionários.</li>
                         
                            </ul>
                            <div class="bottom-area">
                                <a class="btn btn-border btn-xs" href="#">Registrar</a>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4 anima">
                        <div class="cnt-box cnt-pricing-table pricing-table-big">
                            <div class="top-area">
                                <h2>Organização</h2>
                                <div class="price"><span>400 MT</span></div>
                                <p>Por usuário</p>
                            </div>
                            <ul>
                                <li>Neste pacote pode adicionar quantos funcionários forem necessário na plataforma, sendo cobrado o preço de 400 MT por funcionário.</li>
                                
                            </ul>
                            <div class="bottom-area">
                                <a class="btn btn-border btn-xs" href="#">Registrar</a>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4 anima">
                        <div class="cnt-box cnt-pricing-table">
                            <div class="top-area">
                                <h2>Persnolizado</h2>
                                <div class="price"><span>Contactar</span></div>
                                <p>Linha de apoio</p>
                            </div>
                            <ul>
                                <li>Nos contacte e encomende um serviço profissional e personalizado para sua organização.</li>
                               
                            </ul>
                            <div class="bottom-area">
                                <a class="btn btn-border btn-xs" href="{{route('contacts')}}">Contactos</a>
                            </div>
                        </div>
                    </div>
                </div>
              
            </div>
        </section>
        <section class="section-base">
            <div class="container">
                <div class="row">
                    <div class="col-lg-8">
                        <ul class="text-list text-list-side">
                            <li>
                                <h3>Lorem Ipsum</h3>
                                <p>
                                    Placeat orci commodo, amet quo rem architecto possi accumsan non faucibus conubia quisquam mauris facere.
                                </p>
                               
                            </li>
                            <li>
                                <h3>Lorem Ipsum</h3>
                                <p>
                                    Voluptas, numquam tellus pharetra nesciunt habitasse deserunt ante faucibus conubia quisqua nesciunte.
                                </p>
                               
                            </li>
                            <li>
                                <h3>Lorem Ipsum</h3>
                                <p>
                                    Placeat orci commodo, am exercita  iusto, voluptas, numquam tellus pharetra nesciunt habitasse dese ante martello.
                                </p>
                               
                            </li>
                        </ul>
                    </div>
                    <div class="col-lg-4">
                        <div class="title">
                            <h2>Serviços adicionais</h2>
                            <p>Nos contacte para informações</p>
                        </div>  <p class="text-color-1">
                            Placeat orci commo sciunt habitasse dcita  iusto, voluptas, numese ante.
                        </p>
                        <a href="{{route('contacts')}}" class="btn-text active">Contactos</a>
                    </div>
                </div>
            </div>
        </section>
        <section class="section-base section-color">
            <div class="container">
                <div class="row" data-anima="fade-bottom" data-time="1000">
                    <div class="col-lg-12">
                        <div class="title">
                            <h2>Lorem Ipsum Lorem Ipsum</h2>
                            <p>Lorem Ipsum Lorem Ipsum</p>
                        </div>
                        <hr class="space-xs" />
                        <ul class="slider controls-top-right" data-options="type:carousel,arrows:false,nav:true,perView:3,perViewMd:2,perViewXs:1,gap:30,controls:out">
                            <li>
                                <div class="" style="padding:40px; background-color: white; border-radius:5px">
                                    <p>
                                        Lorem Ipsum Lorem IpsumLorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum
                                    </p>
                                   
                                </div>
                            </li>
                            <li>
                                <div style="padding:40px; background-color: white; border-radius:5px">
                                    <p>
                                        Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum
                                    </p>
                                    
                                </div>
                            </li>
                            <li>
                                <div style="padding:40px; background-color: white; border-radius:5px">
                                    <p>
                                        Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum
                                    </p>
                                    
                                </div>
                            </li>
                            <li>
                                <div style="padding:40px; background-color: white; border-radius:5px">
                                    <p>
                                        Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum
                                    </p>
                                    
                                </div>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </section>
        
    
@endsection