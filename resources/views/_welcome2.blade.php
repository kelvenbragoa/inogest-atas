<!doctype html>
<html>
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0,maximum-scale=1.0, user-scalable=no">
<title>Inogest Acta</title>
<link rel="stylesheet" type="text/css" href="{{asset('template2/css/bootstrap.min.css')}}">
<link rel="stylesheet" type="text/css" href="{{asset('template2/css/bootstrap-slider.min.css')}}">
<link rel="stylesheet" type="text/css" href="{{asset('template2/css/fontawesome-all.min.css')}}">
<link rel="stylesheet" type="text/css" href="{{asset('template2/css/slick.css')}}">
<link rel="stylesheet" type="text/css" href="{{asset('template2/css/style.css')}}">
<link rel="stylesheet" type="text/css" href="{{asset('template2/css/custom.css')}}">
</head>

<body>
<div id="header-holder" class="main-header">
    <div class="bg-animation">
        <div class="graphic-show">
            <img class="fix-size" src="{{asset('template2/images/graphic1.png')}}" alt="">
            <img class="img img1" src="{{asset('template2/images/graphic1.png')}}" alt="">
            <img class="img img2" src="{{asset('template2/images/graphic2.png')}}" alt="">
            <img class="img img3" src="{{asset('template2/images/graphic3.png')}}" alt="">
        </div>
    </div>
    <nav id="nav" class="navbar navbar-default navbar-full">
        <div class="container-fluid">
            <div class="container container-nav">
                <div class="row">
                    <div class="col-md-12">
                        <div class="navbar-header">
                            <button aria-expanded="false" type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs">
                                <span class="icon-bar"></span>
                                <span class="icon-bar"></span>
                                <span class="icon-bar"></span>
                            </button>
                            <a class="logo-holder" href="/">
                                <div style="width:62px;height:18px">Inogest</div>
                            </a>
                        </div>
                        <div style="height: 1px;" role="main" aria-expanded="false" class="navbar-collapse collapse" id="bs">
                            <ul class="nav navbar-nav navbar-right">
                                <li><a href="/">Inicio</a></li>
                               
                                <li><a href="{{route('contacts')}}">Contactos</a></li>
                                @auth
                                    <li><a class="login-button" href="{{ url('/home') }}">Home</a></li>
                                @else
                                    
                                    <li><a class="login-button" href="{{ route('login') }}">Login</a></li>

                                   
                                @endauth
                                
                                <li class="support-button-holder support-dropdown">
                                    <a class="support-button" href="#">Suporte</a>
                                    <ul class="dropdown-menu">
                                      <li><a href="#"><i class="fas fa-phone"></i>Ligar a  850110300</a></li>
                                    </ul>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </nav>
    <div id="top-content" class="container-fluid">
        <div class="container">
            <div class="row">
                <div class="col-md-6">
                    <div id="main-slider">
                        <div class="slide">
                            {{-- <div class="noti-holder">
                                <a href="#">
                                    <div class="noti">
                                        <span class="badge">New</span><span class="text">Added new packages in cloud hosting.</span>
                                    </div>
                                </a>
                            </div> --}}
                            <div class="spacer"></div>
                            <div class="big-title">Planear, organizar e gerir as suas actas de reuniões so com <span>Inogest Actas,</span><br>prático e fácil.</div>
                            <p>Inogest Actas é uma plataforma que permite gerir as actas de reuniões realizadas em uma organização, podendo rastrear as ações atribuídas.</p>
                            <div class="btn-holder">
                                <a href="{{route('register')}}" class="ybtn ybtn-header-color">Registrar</a><a href="{{route('contacts')}}" class="ybtn ybtn-white ybtn-shadow">Contactos</a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <img class="header-graphic" src="{{asset('template2/images/graphic1.png')}}" alt="" />
                </div>
            </div>
        </div>
    </div>
</div>
<div id="info" class="container-fluid">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="info-text">Esta plataforma foi desenvolvida para equipas que conduzem reuniões a grande escala e deseja que todas ações sejam registradas e rastreadas até o seu cumprimento.</div>
                
                <a href="{{route('register')}}" class="ybtn ybtn-accent-color ybtn-shadow">Criar uma conta</a>
            </div>
        </div>
    </div>
</div>
<div id="services" class="container-fluid">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="row-title">Nossos serviços</div>
                <div class="row-subtitle">Desenvolvido para aumentar a perfomance de equipes.</div>
            </div>
        </div>
        <div class="row">
            <div class="col-sm-12 col-md-6">
                <div class="service-box">
                    <div class="service-icon">
                        <img src="{{asset('template2/images/service-icon1.svg')}}" alt="">
                    </div>
                    <div class="service-title"><a href="#">Criação de Departamentos</a></div>
                    <div class="service-details">
                        <p>Está organizada em departamentos criada pela organização, os departamentos gerem as suas actas de reuniões e rastreamento de tarefas.
                        </p>
                    </div>
                </div>
            </div>
            <div class="col-sm-12 col-md-6">
                <div class="service-box">
                    <div class="service-icon">
                        <img src="{{asset('template2/images/service-icon2.svg')}}" alt="">
                    </div>
                    <div class="service-title"><a href="#">Criação de funcionários</a></div>
                    <div class="service-details">
                        <p>
                            Os funcionários são criados em cada departamento, onde estes podem desempenhar uma ação dentro de uma reunião.
                        </p>
                    </div>
                </div>
            </div>
            <div class="col-sm-12 col-md-6">
                <div class="service-box">
                    <div class="service-icon">
                        <img src="{{asset('template2/images/service-icon3.svg')}}" alt="">
                    </div>
                    <div class="service-title"><a href="#">Envio de Email</a></div>
                    <div class="service-details">
                        <p>
                            A plataforma envia as actas de reunião elaboradas para os intervenientes por email. Os funcionários também verificar diretamente na plataforma.
                        </p>
                    </div>
                </div>
            </div>
            <div class="col-sm-12 col-md-6">
                <div class="service-box">
                    <div class="service-icon">
                        <img src="{{asset('template2/images/service-icon4.svg')}}" alt="">
                    </div>
                    <div class="service-title"><a href="#">Rastreamento de ações</a></div>
                    <div class="service-details">
                        <p>
                            Rastreamento de ações atribuídas em reuniões. Podendo assegurar assim o cumprimento dentro de prazos estabelecidos para ação.
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<div id="message1" class="container-fluid message-area">
    <div class="bg-color"></div>
    <div class="container">
        <div class="row">
            <div class="col-sm-12 col-md-6">
                <div class="text-other-color1">Você está pronto?</div>
                <div class="text-other-color2">Crie uma conta, ou nos contacte.</div>
            </div>
            <div class="col-sm-12 col-md-6">
                <div class="buttons-holder">
                    <a href="{{route('register')}}" class="ybtn ybtn-accent-color">Criar uma conta</a><a href="{{route('contacts')}}" class="ybtn ybtn-white ybtn-shadow">Nos contacte</a>
                </div>
            </div>
        </div>
    </div>
</div>
<div id="pricing" class="container-fluid">
    <div class="bg-color"></div>
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="row-title">Inogest Actas Tarifas</div>
                <div class="row-subtitle">Escolhe a sua tarifa</div>
            </div>
        </div>
        <div class="row">
            <div class="col-sm-6 col-md-4">
                <div class="pricing-box pricing-unity pricing-color1">
                    <div class="pricing-content">
                        <div class="pricing-icon">
                            <img src="{{asset('template2/images/service-icon1.svg')}}" alt="">
                        </div>
                        <div class="pricing-title">Básico</div>
                        <div class="price-title">Iniciando de</div>
                        <div class="pricing-price">Grátis</div>
                        <div class="pricing-details">
                            <p>Sempre que quiseres o básico, onde é permitido registrar até no máximo 3 funcionários.</p>
                        </div>
                        <div class="pricing-link">
                            <a class="ybtn" href="{{route('register')}}">Iniciar</a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-sm-6 col-md-4">
                <div class="pricing-box pricing-unity pricing-color2 featured">
                    <div class="pricing-content">
                        <div class="pricing-icon">
                            <img src="{{asset('template2/images/service-icon4.svg')}}" alt="">
                        </div>
                        <div class="pricing-title">Equipe</div>
                        <div class="price-title">Iniciando de</div>
                        <div class="pricing-price">400 MT por Funcionário</div>
                        <div class="pricing-details">
                            <p>Neste pacote pode adicionar quantos funcionários forem necessário na plataforma, sendo cobrado o preço de 400 MT por funcionário.</p>
                        </div>
                        <div class="pricing-link">
                            <a class="ybtn" href="{{route('register')}}">Iniciar</a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-sm-12 col-md-4">
                <div class="pricing-box pricing-unity pricing-color3">
                    <div class="pricing-content">
                        <div class="pricing-icon">
                            <img src="{{asset('template2/images/service-icon3.svg')}}" alt="">
                        </div>
                        <div class="pricing-title">Personalizado</div>
                        <div class="price-title">Iniciando de</div>
                        <div class="pricing-price">Contactar</div>
                        <div class="pricing-details">
                            <p> Nos contacte e encomende um serviço profissional e personalizado para sua organização.</p>
                        </div>
                        <div class="pricing-link">
                            <a class="ybtn" href="">Contactar 850110300</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
{{-- <div id="custom-plan" class="container-fluid">
    <div class="container">
        <div class="row">
            <div class="col-md-8">
                <h4>Create your plan</h4>
                <p>At vero eos et accusamus et iusto odio dignissimos ducimus qui blanditiis praesentium voluptatum div atque corrupti quos dolores et quas molestias.</p>
                <div class="custom-plan-box">
                    <input id="c-plan" type="text" data-slider-min="100" data-slider-max="10000" data-slider-step="100" data-slider-value="5000" data-currency="$" data-unit="GB">
                </div>
            </div>
            <div class="col-md-4">
                <div class="custom-plan-info-box">
                    <div class="title">Your custom plan</div>
                    <div class="details">
                        <div class="feature feature1"><span>5</span> GB</div>
                        <div class="feature feature2"><span>20</span> GB Bandwidth</div>
                        <div class="feature feature3">E-mail accounts</div>
                        <div class="feature feature4">Unlimited other features</div>
                    </div>
                    <div class="price">$250</div>
                    <div class="btn-holder">
                        <a href="signup.html" class="ybtn ybtn-accent-color">Order now</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div> --}}
<div id="features" class="container-fluid">
    <div class="container">
        <div class="row">
            <div class="col-xs-12">
                <div class="row-title">Nossos recursos da plataforma</div>
                <div class="row-subtitle"></div>
            </div>
        </div>
        <div class="row rtl-cols">
            <div class="col-sm-12 col-md-6">
                <div id="features-links-holder">
                    <div class="icons-axis">
                        <img src="{{asset('template2/images/features-icon.png')}}" alt="">
                    </div>
                    <div class="feature-icon-holder feature-icon-holder1 opened" data-id="1">
                        <div class="animation-holder"><div class="special-gradiant"></div></div>
                        <div class="feature-icon"><i class="htfy htfy-worldwide"></i></div>
                        <div class="feature-title">%99 Disponibilidade</div>
                    </div>
                    <div class="feature-icon-holder feature-icon-holder2" data-id="2">
                        <div class="animation-holder"><div class="special-gradiant"></div></div>
                        <div class="feature-icon"><i class="htfy htfy-cogwheel"></i></div>
                        <div class="feature-title">Painel de controle de fácil acesso</div>
                    </div>
                    <div class="feature-icon-holder feature-icon-holder3" data-id="3">
                        <div class="animation-holder"><div class="special-gradiant"></div></div>
                        <div class="feature-icon"><i class="htfy htfy-location"></i></div>
                        <div class="feature-title">Envio de email</div>
                    </div>
                    <div class="feature-icon-holder feature-icon-holder4" data-id="4">
                        <div class="animation-holder"><div class="special-gradiant"></div></div>
                        <div class="feature-icon"><i class="htfy htfy-download"></i></div>
                        <div class="feature-title">Rastreamento de tarefas</div>
                    </div>
                    <div class="feature-icon-holder feature-icon-holder5" data-id="5">
                        <div class="animation-holder"><div class="special-gradiant"></div></div>
                        <div class="feature-icon"><i class="htfy htfy-like"></i></div>
                        <div class="feature-title">Suporte 24h/7dias</div>
                    </div>
                </div>
            </div>
            <div class="col-sm-12 col-md-6">
                <div id="features-holder">
                    <div class="feature-box feature-d1 show-details">
                        <div class="feature-title-holder">
                            <span class="feature-icon"><i class="htfy htfy-worldwide"></i></span>
                            <span class="feature-title">%99 Disponibilidade</span>
                        </div>
                        <div class="feature-details">
                            <p>Contamos com uma alta disponibilidade. Os erros são tratados a tempo, que não afetam a execução das suas tarefas dentro da plataforma.</p>

                            
                        </div>
                    </div>
                    <div class="feature-box feature-d2">
                        <div class="feature-title-holder">
                            <span class="feature-icon"><i class="htfy htfy-cogwheel"></i></span>
                            <span class="feature-title">Painel de controle de fácil acesso</span>
                        </div>
                        <div class="feature-details">
                            <p>Os usuários de plataforma contam um painel de controle de fácil acesso e interpretação. Os painéis foram desenvolvidos com uma curva de aprendizado muito curta, sendo que o 
                                usuários utilize sem dificuldades.
                            </p>
                        </div>
                    </div>
                    <div class="feature-box feature-d3">
                        <div class="feature-title-holder">
                            <span class="feature-icon"><i class="htfy htfy-location"></i></span>
                            <span class="feature-title">Envio de email</span>
                        </div>
                        <div class="feature-details">
                            <p>A plataforma conta com o recurso de envio de email para participantes da reunião, mesmo que seja alguem que não faz parte da organização.</p>
                        </div>
                    </div>
                    <div class="feature-box feature-d4">
                        <div class="feature-title-holder">
                            <span class="feature-icon"><i class="htfy htfy-download"></i></span>
                            <span class="feature-title">Rastreamento de tarefas</span>
                        </div>
                        <div class="feature-details">
                            <p>
                                É possivel o rastreamento de todas tarefas deixadas em uma reunião e assim acompanhar a execução desta tarefa. São emitidos alertas inteligentes para cada uma das tarefas, desde o inicio até quando está prestes a expirar.
                            </p>
                        </div>
                    </div>
                    <div class="feature-box feature-d5">
                        <div class="feature-title-holder">
                            <span class="feature-icon"><i class="htfy htfy-like"></i></span>
                            <span class="feature-title">Suporte 24h/7dias</span>
                        </div>
                        <div class="feature-details">
                            <p>Contamos com um suporte da plataforma de 24h por 7 dias.</p>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
</div>
{{-- <div id="testimonials" class="container-fluid">
    <div class="bg-color"></div>
    <div class="container">
        <div class="row">
            <div class="col-xs-12">
                <div class="row-title">Testimonials</div>
                <div class="row-subtitle">What others said about us?</div>
            </div>
        </div>
        <div class="row">
            <div class="col-xs-12">
                <div id="testimonials-slider">
                    <div>
                        <div class="details-holder">
                            <img class="photo" src="{{asset('template2/images/person1.jpg')}}" alt="">
                            <h4>Chris Walker</h4>
                            <h5>CEO & CO-Founder @HelloBrandio</h5>
                            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Mauris egestas non ante non consequat. Aenean accumsan eros vel elit tristique, non sodales nunc luctus. Etiam vitae odio eget orci finibus auctor ut eget magna.</p>
                        </div>
                    </div>
                    <div>
                        <div class="details-holder">
                            <img class="photo" src="{{asset('template2/images/person2.jpg')}}" alt="">
                            <h4>Chris Walker</h4>
                            <h5>CEO & CO-Founder @HelloBrandio</h5>
                            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Mauris egestas non ante non consequat. Aenean accumsan eros vel elit tristique, non sodales nunc luctus. Etiam vitae odio eget orci finibus auctor ut eget magna.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div> --}}

<div id="more-features" class="container-fluid">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="row-title">Nossa promessa</div>
                <div class="row-subtitle">A sua satisfação é garantida</div>
            </div>
        </div>
        <div class="row">
            <div class="col-sm-6 col-md-4">
                <div class="mfeature-box">
                    <div class="mfeature-icon">
                        <i class="htfy htfy-trophy"></i>
                    </div>
                    <div class="mfeature-title">%99.9 Disponibilidade</div>
                    <div class="mfeature-details">Trabalhamos para manter a nossa disponibilidade, a qualquer momento acessível.</div>
                </div>
            </div>
           
            <div class="col-sm-12 col-md-4">
                <div class="mfeature-box">
                    <div class="mfeature-icon">
                        <i class="htfy htfy-cogwheel"></i>
                    </div>
                    <div class="mfeature-title">Melhor suporte</div>
                    <div class="mfeature-details">Estamos sempre disponível para dar suporte em qualquer dificuldade que encontrar na plataforma</div>
                </div>
            </div>
            <div class="col-sm-6 col-md-4">
                <div class="mfeature-box">
                    <div class="mfeature-icon">
                        <i class="htfy htfy-like"></i>
                    </div>
                    <div class="mfeature-title">Serviços de qualidade</div>
                    <div class="mfeature-details">Na nossa plataforma cada ação foi desenvolvida no mínimo detalhe para que seja a melhor.</div>
                </div>
            </div>
            
        </div>
    </div>
</div>
<div id="message2" class="container-fluid message-area normal-bg boxed">
    <div class="container">
        <div class="row">
            <div class="col-sm-12 col-md-6">
                <div class="text-other-color1">Você está pronto?</div>
                <div class="text-other-color2">crie uma conta, ou nos contacte.</div>
            </div>
            <div class="col-sm-12 col-md-6">
                <div class="buttons-holder">
                    <a href="{{route('register')}}" class="ybtn ybtn-accent-color">Crie a sua conta</a><a href="{{route('contacts')}}" class="ybtn ybtn-white ybtn-shadow">Nos contacte</a>
                </div>
            </div>
        </div>
    </div>
</div>
<div id="footer" class="container-fluid">
    <div class="container">
        <div class="row">
            <div class="col-xs-6 col-sm-4 col-md-3">
                <div class="address-holder">
                    <div class="phone"><i class="fas fa-phone"></i> +258 85 011 0300</div>
                    <div class="email"><i class="fas fa-envelope"></i> suporte@inovatis.co.mz</div>
                    <div class="address">
                        <i class="fas fa-map-marker"></i> 
                        <div>Rua Filipe Samuel Magaia,<br>
                            Beira<br>
                            Moçambique.</div>
                    </div>
                </div>
            </div>
            <div class="col-xs-6 col-sm-2 col-md-2">
                <div class="footer-menu-holder">
                    <h4>Sobre nós</h4>
                    <ul class="footer-menu">
                        
                        <li><a href="{{route('faq')}}">FAQ</a></li>
                        <li><a href="{{route('contacts')}}">Contactos</a></li>
                    </ul>
                </div>
            </div>
            <div class="col-xs-6 col-sm-2 col-md-3">
                <div class="footer-menu-holder">
                    <h4>Serviços</h4>
                    <ul class="footer-menu">
                        <li><a href="#">Registro de actas de reunião</a></li>
                        <li><a href="#">Rastreamento de Tarefas</a></li>
                        <li><a href="#">Envio de Email</a></li>
                    </ul>
                </div>
            </div>
            <div class="col-xs-6 col-sm-3 col-md-3">
                <div class="footer-menu-holder">
                    <h4>Outros</h4>
                    <ul class="footer-menu">
                        <li><a href="#">Desenvolvimento de Sistemas</a></li>
                        <li><a href="#">Criação e gestão de processos</a></li>
                        <li><a href="#">Suporte</a></li>
                       
                    </ul>
                </div>
            </div>
            <div class="col-xs-12 col-sm-1 col-md-1">
                <div class="social-menu-holder">
                    <ul class="social-menu">
                        <li><a href="#"><i class="fab fa-facebook"></i></a></li>
                        <li><a href="#"><i class="fab fa-youtube"></i></a></li>
                        <li><a href="#"><i class="fab fa-twitter"></i></a></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>
<script src="{{asset('template2/js/jquery.min.js')}}"></script>
<script src="{{asset('template2/js/bootstrap.min.js')}}"></script>
<script src="{{asset('template2/js/bootstrap-slider.min.js')}}"></script>
<script src="{{asset('template2/js/slick.min.js')}}"></script>
<script src="{{asset('template2/js/main.js')}}"></script>
</body>
</html>
