</main>
<i class="scroll-top-btn scroll-top show"></i>
<footer class="light">
    <div class="container">
        <div class="row">
            <div class="col-lg-4">
                <h3>Inogest-Atas</h3>
                <p>Uma plataforma para sua equipe.</p> 
                <div class="icon-links icon-social icon-links-grid social-colors">
                    <a class="facebook"><i class="icon-facebook"></i></a>
                    <a class="instagram"><i class="icon-instagram"></i></a>
                </div>
            </div>
            <div class="col-lg-4">
                <h3>Recursos</h3>
                <ul class="icon-list icon-line">
                    <li><a href="/">Inicio</a></li>
                    <li><a href="{{route('contacts')}}">Contactos</a></li>
                    {{-- <li><a href="{{route('faq')}}">FAQ</a></li> --}}
                    <li><a href="{{route('login')}}">Login</a></li>
                    
                </ul>
            </div>
            <div class="col-lg-4">
                <ul class="text-list text-list-line">
                    <li><b>Endereço</b><hr /><p>Africa, Moçambique</p></li>
                    <li><b>Email</b><hr /><p>inovatis@inovatis.co.mz</p></li>
                    <li><b>Telefone</b><hr /><p>+258 850110300</p></li>
                   
                </ul>
            </div>
        </div>
    </div>
    <div class="footer-bar">
        <div class="container">
            <span>© {{date('Y')}} Inogest-Atas - Desenvolvido por <a href="https://inovatis.co.mz" target="_blank">INOVATIS MZ LTD</a>.</span>
            <span><a href="{{route('contacts')}}">Contactos</a> | <a href="{{route('policy')}}">Politicas de privacidade</a></span>
        </div>
    </div>
    <link rel="stylesheet" href="themekit/media/icons/iconsmind/line-icons.min.css">
    <script src="{{asset('template3/themekit/scripts/jquery.min.js')}}"></script>
    <script src="{{asset('template3/themekit/scripts/main.js')}}"></script>
    <script src="{{asset('template3/themekit/scripts/parallax.min.js')}}"></script>
    <script src="{{asset('template3/themekit/scripts/glide.min.js')}}"></script>
    <script src="{{asset('template3/themekit/scripts/magnific-popup.min.js')}}"></script>
    <script src="{{asset('template3/themekit/scripts/tab-accordion.js')}}"></script>
    <script src="{{asset('template3/themekit/scripts/imagesloaded.min.js')}}"></script>
    <script src="{{asset('template3/themekit/scripts/progress.js')}}" async></script>
    <script src="{{asset('template3/themekit/scripts/custom.js')}}" async></script>
    <script src="{{asset('template3/themekit/scripts/contact-form/contact-form.js')}}" async></script>
</footer>
</body>
</html>
