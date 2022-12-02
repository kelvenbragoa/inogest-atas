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
    <div id="header-holder" class="inner-header contact-header">
   
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

    <div id="page-head" class="container-fluid inner-page">
        <div class="container">
            <div class="row">
                <div class="col-md-12 text-center">
                    <div class="page-title">Perguntas frequentes</div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12 text-center">
                    <div class="text">Encontre aqui a resposta da sua dúvida.</div>
                </div>
            </div>
        </div>
    </div>
</div>
<div id="page-content" class="container-fluid">
    <div class="container">
        <div class="row">
            <div class="col-xs-12">
                <div class="content-holder">
                    <h4>ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod?</h4>
                    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua, Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore.</p>

                    <h4>non proident, sunt in culpa qui officia deserunt mollit anim id est?</h4>
                    <p>eget mauris lacinia lacinia. Quisque in scelerisque augue. Vestibulum nec ornare tellus. Maecenas ac luctus risus. Maecenas laoreet leo lacus, a rutrum ante hendrerit a. Quisque euismod placerat sapien sed tempor. Nulla et magna dictum, tincidunt mi ut, fringilla nibh. Sed in lectus ac dui faucibus elementum.</p>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-xs-12 col-md-6">
                <div class="content-holder">
                    <h4>ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod?</h4>
                    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua, Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore.</p>
                </div>
            </div>
            <div class="col-xs-12 col-md-6">
                <div class="content-holder">
                    <h4>ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod?</h4>
                    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua, Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore.</p>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-xs-12 col-md-4">
                <div class="content-holder">
                    <h4>ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod?</h4>
                    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua, Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore.</p>
                </div>
            </div>
            <div class="col-xs-12 col-md-4">
                <div class="content-holder">
                    <h4>ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod?</h4>
                    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua, Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore.</p>
                </div>
            </div>
            <div class="col-xs-12 col-md-4">
                <div class="content-holder">
                    <h4>ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod?</h4>
                    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua, Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore.</p>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-xs-12 col-sm-6 col-md-3">
                <div class="content-holder">
                    <h4>ipsum dolor adipiscing?</h4>
                    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>
                </div>
            </div>
            <div class="col-xs-12 col-sm-6 col-md-3">
                <div class="content-holder">
                    <h4>sed do eiusmod?</h4>
                    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>
                </div>
            </div>
            <div class="col-xs-12 col-sm-6 col-md-3">
                <div class="content-holder">
                    <h4>consectetur adipiscing?</h4>
                    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>
                </div>
            </div>
            <div class="col-xs-12 col-sm-6 col-md-3">
                <div class="content-holder">
                    <h4>ipsum dolor sit amet?</h4>
                    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>
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
