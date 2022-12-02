@extends('layouts.master')
@section('content')
<section class="section-base section-full-width no-padding">
    <div class="container">
        <div class="google-map" data-marker="media/marker.png" data-zoom="12" data-coords="51.5156177,-0.0919983"></div>   
    </div>
</section>
<section class="section-base section-color">
    <div class="container">
        <div class="row">
            <div class="col-lg-8">
                <div class="title">
                    <h2>Mande-nos uma mensagem</h2>
                    <p>Nos contacte por aqui</p>
                </div>
                <form action="themekit/scripts/contact-form/contact-form.php" class="form-box form-ajax" method="post" data-email="example@domain.com">
                    <div class="row">
                        <div class="col-lg-6">
                            <input id="name" name="name" placeholder="Name" type="text" class="input-text" required>
                        </div>
                        <div class="col-lg-6">
                            <input id="email" name="email" placeholder="Email" type="email" class="input-text" required>
                        </div>
                    </div>
                    <textarea id="messagge" name="messagge" class="input-textarea" placeholder="Write something ..." required></textarea>
                    <div class="form-checkbox">
                        <input type="checkbox" id="check" name="check" value="check" required>
                        <label for="check">Você aceita os termos de privacidade</label>
                    </div>
                    <button class="btn btn-xs" type="submit">Enviar mensagem</button>
                    <div class="success-box">
                        <div class="alert alert-success">Sucesso. A sua mensagem foi enviada com sucesso</div>
                    </div>
                    <div class="error-box">
                        <div class="alert alert-warning">Erro, tente novamente. Sua mensagem não foi enviada</div>
                    </div>
                </form>
            </div>
            <div class="col-lg-4">
                <hr class="space visible-md" />
                <div class="boxed-area">
                    <h3>Contactos</h3>
                    
                    <ul class="text-list text-list-line">
                        <li><b>Endereço</b><hr /><p>Africa, Moçambique</p></li>
                        <li><b>Website</b><hr /><p>https://www.inovatis.co.mz</p></li>
                        <li><b>Email</b><hr /><p>inovatis@inovatis.co.mz</p></li>
                        <li><b>Telefone</b><hr /><p>+258 850110300</p></li>
                    </ul>
                    <hr class="space-sm" />
                    <div class="icon-links icon-social icon-links-grid social-colors">
                        <a class="facebook"><i class="icon-facebook"></i></a>
                        <a class="twitter"><i class="icon-twitter"></i></a>
                        <a class="instagram"><i class="icon-instagram"></i></a>
                        <a class="pinterest"><i class="icon-pinterest"></i></a>
                    </div>
                </div>

            </div>
        </div>
    </div>
</section>

@endsection