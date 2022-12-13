@extends('layouts.master')
@section('content')

        <section class="section-image section-home-one no-padding-y" >
            <div class="container">
                <div class="row">
                    <div class="col-lg-7">
                        <hr class="space-lg" />
                        <h3 class="text-color-2">
                            InoGest ATAS
                        </h3>
                        <ul class="slider" data-options="arrows:false,nav:false,autoplay:3000,controls:out">
                            <li>
                                <h1 class="text-uppercase">IMPULSIONAR O PLANEAMENTO, ORGANIZAÇÃO E GESTÃO DAS DECISÕES TOMADAS EM REUNIÕES.</h1> 
                            </li>
                            <li>
                                <h1 class="text-uppercase">INOVADOR, FÁCIL E PRÁTICO.
                                </h1>
                            </li>
                            {{-- <li>
                                <h1 class="text-uppercase">Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum</h1>
                            </li> --}}
                        </ul>
                        <p>
                            InoGest Atas a plataforma que aumenta a produtividade da sua gestão.
.
                        </p>
                        <hr class="space-sm" />
                        <a href="{{route('register')}}" class="btn btn-sm width-190 full-width-sm">Registrar</a>
                        <a href="{{route('login')}}" class="btn btn-border btn-sm width-190 active full-width-sm">Login</a>
                        <hr class="space-lg" />
                        <hr class="space-lg" />
                    </div>
                    <div class="col-lg-5 hidden-md">
                        <hr class="space-sm" />
                        <img data-anima="fade-bottom" data-time="1000" class="slide-image" src="storage/frontend/image1.png" alt="" />
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
                                    <h2>ESTRUTURA ORGANIZACIONAL</h2>
                                    <p>
                                        Organize o InoGest ATAs com a mesma estrutura da sua empresa. Crie seus departamentos, cadastre funcionários e monitore suas ações de forma eficiente.
                                    </p>
                                </div>
                            </div>
                        </div>
                        <div class="grid-item">
                            <div class="cnt-box cnt-box-top-icon boxed">
                                <i class="im-bar-chart2"></i>
                                <div class="caption">
                                    <h2>TIPOS DE REUNIÕES</h2>
                                    <p>
                                        A produtividade esta diretamente ligado ao modelo de gestão, sendo necessário definir, estrategicamente tipos de reuniões e sua periodicidade.
                                    </p>
                                </div>
                            </div>
                        </div>
                        <div class="grid-item">
                            <div class="cnt-box cnt-box-top-icon boxed">
                                <i class=" im-medal"></i>
                                <div class="caption">
                                    <h2>PAINEL DE INDICADORES </h2>
                                    <p>
                                        InoGest Atas desenhado para simplificar a gestão, conta com um painel de indicadores, resumindo o resultado da organização
                                    </p>
                                </div>
                            </div>
                        </div>
                        <div class="grid-item">
                            <div class="cnt-box cnt-box-top-icon boxed">
                                <i class="im-business-man"></i>
                                <div class="caption">
                                    <h2>AÇÕES E ALERTAS</h2>
                                    <p>
                                        InoGest ATAs, permite um monitoramento dinâmico das decisões tomadas em cada reunião. As decisões transforma-se em ações com datas de execução, os   alertas sistemáticos por email garantem um monitoramento integrado.
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
                                    <img src="storage/frontend/image2.png" alt="">
                                    <span>InoGest Atas</span>
                                </a>
                            </li>
                           
                        </ul>
                    </div>
                    <div class="col-lg-6">
                        <div class="title">
                            <h2>InoGest Atas</h2>
                           
                        </div>
                        <p>
                            A forma inteligente de gerir tomadas de decisão.
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
                            <h2>InoGest Atas</h2>
                            <p>Nossos serviços</p>
                        </div>
                    </div>
                    
                </div>
                <hr class="space" />
                <div class="grid-list" data-columns="3" data-columns-md="2" data-columns-sm="1" data-anima="fade-bottom" data-time="1000">
                    <div class="grid-box">
                        <div class="grid-item">
                            <div class="cnt-box cnt-box-info boxed" data-href="#">
                                <a href="#" class="img-box"><img src="storage/frontend/1.png" alt="" /></a>
                                <div class="caption">
                                    <h2>%99 Disponibilidade</h2>
                                   
                                    <p>
                                        Contamos com uma alta disponibilidade. Os erros são tratados a tempo, que não afetam a execução das suas tarefas dentro da plataforma.
                                    </p>
                                </div>
                            </div>
                        </div>
                        <div class="grid-item">
                            <div class="cnt-box cnt-box-info boxed" data-href="#">
                                <a href="#" class="img-box"><img src="storage/frontend/3.png" alt="" /></a>
                                <div class="caption">
                                    <h2>Envio de email</h2>
                                   
                                    <p>
                                        A plataforma conta com o recurso de envio de email para participantes da reunião, mesmo que seja alguem que não faz parte da organização.
                                    </p>
                                </div>
                            </div>
                        </div>
                        <div class="grid-item">
                            <div class="cnt-box cnt-box-info boxed" data-href="#">
                                
                                <a href="#" class="img-box"><img src="storage/frontend/4.png" alt="" /></a>
                                <div class="caption">
                                    <h2>Suporte 24h/7dias</h2>
                                  
                                    <p>
                                        Contamos com um suporte da plataforma de 24h por 7 dias.
                                    </p>
                                </div>
                            </div>
                        </div>
                        <div class="grid-item">
                            <div class="cnt-box cnt-box-info boxed" data-href="#">
                                <a href="#" class="img-box"><img src="storage/frontend/2.png" alt="" /></a>
                                <div class="caption">
                                    <h2>Painel de controle de fácil acesso</h2>
                                
                                    <p>
                                        Os usuários de plataforma contam um painel de controle de fácil acesso e interpretação. Os painéis foram desenvolvidos com uma curva de aprendizado muito curta, sendo que o usuários utilize sem dificuldades.
                                    </p>
                                </div>
                            </div>
                        </div>
                        
                        {{-- <div class="grid-item">
                            <div class="cnt-box cnt-box-info boxed" data-href="#">
                                <a href="#" class="img-box"><img src="http://via.placeholder.com/800x500" alt="" /></a>
                                <div class="caption">
                                    <h2>Lorem Ipsum</h2>
                                
                                    <p>
                                        Excepteur sint occaecat cupidatat non proidento in culpa qui officia deserunt mollit anim id est laborum.
                                    </p>
                                </div>
                            </div>
                        </div> --}}
                        <div class="grid-item">
                            <div class="cnt-box cnt-box-info boxed" data-href="#">
                               
                                <a href="#" class="img-box"><img src="storage/frontend/5.png" alt="" /></a>
                                <div class="caption">
                                    <h2>Rastreamento de tarefas</h2>
                                   
                                    <p>
                                        É possivel o rastreamento de todas tarefas deixadas em uma reunião e assim acompanhar a execução desta tarefa. São emitidos alertas inteligentes para cada uma das tarefas, desde o inicio até quando está prestes a expirar.
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
                            <h2>InoGest Atas</h2>
                            <p>Mantenha as tarefas organizadas</p>
                        </div>
                        <p>
                            Seja planejando uma reunião, o InoGest Atas ajuda você a se manter organizado e cumprir prazos 5 vezes mais rápido com o gerenciamento de tarefas.
                        </p>
                        <hr class="space-sm" />
                        <ul class="accordion-list">
                            <li>
                                <a href="#">Organização de tarefas por departamentos</a>
                                <div class="content">
                                    <p>
                                       Cada departamente tem uma visão geral das tarefas existentes e prazos das mesmas, podendo gerenciar as tarefas.
                                    </p>
                                </div>
                            </li>

                            <li>
                                <a href="#">Notficações de tarefas</a>
                                <div class="content">
                                    <p>
                                       Quando as tarefas estão prestes a expirar, são emitidas alertas para que seja cumprida a prazo.
                                    </p>
                                </div>
                            </li>
                            <li>
                                <a href="#">Visão geral em calendário</a>
                                <div class="content">
                                    <p>
                                        Uma visão em calendário é fornecida para poder se gerenciar todas tarefas atribuídas, assim o gestor tem a noção dos prazos para o cumprimento da tarefa.
                                    </p>
                                </div>
                            </li>
                        </ul>
                    </div>
                    <div class="col-lg-6">
                        <img src="storage/frontend/image3.png" alt="" />
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
                                <div class="price"><span style="font-size:30px">Grátis</span></div>
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
                                <div class="price"><span style="font-size:30px">250 MT</span></div>
                                <p>Por usuário</p>
                            </div>
                            <ul>
                                <li>Neste pacote pode adicionar quantos funcionários forem necessário na plataforma, sendo cobrado o preço de 250 MT por funcionário.</li>
                                
                            </ul>
                            <div class="bottom-area">
                                <a class="btn btn-border btn-xs" href="#">Registrar</a>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4 anima">
                        <div class="cnt-box cnt-pricing-table">
                            <div class="top-area">
                                <h2>Personalizado</h2>
                                <div class="price"><span style="font-size:30px">Contactar</span></div>
                                <p>Linha de apoio</p>
                            </div>
                            <ul>
                                <li>Nos contacte e encomende um serviço personalizado para sua organização.</li>
                            </ul>

                            <div class="bottom-area">
                                <a class="btn btn-border btn-xs" href="{{route('contacts')}}">Contactos</a>
                            </div>

                        </div>
                    </div>
                </div>
              
            </div>
        </section>
        {{--<section class="section-base">
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
        </section> --}}
        
    
@endsection