@extends('admin.partials.master')

@section('content')
  <!-- LOGIN -->
    <main class="flex-grid--col col-12 login">
      <section class="flex-grid login__section col valign-middle halign-center pd-50--top pd-50--bottom">
        <div class="login__box">
          <!-- ALERTS -->
          <p class="alert--info">
            Bem-vindo, preencha os campos abaixo para efetuar o login.
          </p>
          
          <form class="flex-grid--wrap login__form form shadow pd-20" action="" method="post">
            <!-- LOGO SITE -->
            <figure class="flex-grid form__box login__figure">
              <img class="login__img" src="assets/dist/images/logo.png"></img>
            </figure>
            <!-- /LOGO SITE -->
            <div class="flex-grid--wrap form__box col-12">
              <span class="color-danger hidden col-12" data-message="E-mail"></span>
              <input id="email" class="input--default input-nomargin col" type="text" name="email" data-validate="empty:email" data-name="E-mail" placeholder="E-mail ou Login" />
            </div>
            <div class="flex-grid--wrap form__box col-12">
              <span class="color-danger hidden col-12" data-message="Senha"></span>
              <div class="flex-grid box-password col mg-10--bottom valign-top">
                <input id="password" class="input--default input-nomargin box-password__input col" type="password" name="password" data-validate="empty" data-name="Senha" placeholder="Senha" />
                <i class="fa fa-eye box-password__show color-default"></i>
              </div>
            </div>
            <div class="checkbox form__box flex-grid col pd-10--right is-xs">
              <div class="checkbox__group flex-grid">
                <div class="checkbox__fake fake-default flex-grid">
                  <i class="checkbox__check check-default" aria-hidden="true"></i>
                </div>
                <p class="text color-default pd-10--left">Mantenha-me conectado</p>
                <input class="checkbox__hidden" type="checkbox" name=""/>
              </div>
            </div>
            <div class="flex-grid form__box col-0 halign-right is-xs">
              <button class="btn--first btn-noradius self-top col" type="submit"/>
                  Entrar
                <i class="fa fa-long-arrow-right fa-right"></i>  
              </button>
            </div>
            <div class="flex-grid--wrap col-12">
              <p class="text color-default col-12"><a href="#" class="link--first">Esqueceu sua senha?</a></p>
            </div>
          </form>
        </div>
      </section>
      <footer class="footer flex-grid halign-center pd-20">
        <p class="text-center font-small color-white">
          <a class="link--white" href="http://www.kbrtec.com.br" target="_blank">© Kbrtec</a> - Todos os direitos reservados
        </p>
      </footer>
    </main>
    <!-- /LOGIN -->

@endsection