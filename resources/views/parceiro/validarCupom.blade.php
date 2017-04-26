@extends('parceiro.partials.master')

@section('content')
 <!-- MAIN HOME -->
      <main class="main flex-grid col">
        <!-- ASIDE -->
         @include("parceiro.includes.aside")
        <section class="main__content content home flex-grid--wrap col calign-top">
          <!-- TOP -->
          <div class="flex-grid--row-rev--wrap col-12 calign-top mg-30--bottom">
            <!-- BREADCRUMB -->
            @include('parceiro.includes.breadcrumb')
            
           <!-- TITLE PAGE -->
            <h1 class="col light font-30 main-title is-sm">Parceiro - Cupom</h1>
          </div>
          <!-- /TOP -->
          
          <div class="flex-grid--wrap content__box--second nopadding col-12">
              @if(\Session::has('mensagem'))
              <span class="alert--{{ \Session::get('mensagem')['class'] }}">
                {{ \Session::get('mensagem')['text'] }}
              </span>
            @endif
            @if(\Session::has('errors'))
              <span class="alert--danger">
                @foreach(\Session::get('errors')->all() as $error)
                  <p>{{ $error }}</p>
                @endforeach
              </span>
            @endif
            <h2 class="font-20 light pd-10 color-default col-12">Validar Cupom</h2>
            <form class="form__maquinas form flex-grid--wrap col-12 pd-10" data-type-form="default" method="POST" action="/Parceiro/Cupom/Validar">
              {{ csrf_field() }}
              {{ method_field('PUT') }}
              <div class="flex-grid--wrap col-12">
                <span class="font-small bold mg-10--bottom">Título</span>
                <p class="font-small col-12 color-danger hidden" data-message="Título"></p>
                <input class="input col-12" type="text" maxlength="150" name="cd_cupom" data-validate="empty" data-name="Cupom" placeholder="Informe o cupom" required />
              </div>
              <div class="flex-grid col-12">
                <button type="submit" class="col-0 btn--second btn-nomargin is-sm mg-10--top">
                  <i class="fa fa-upload fa-left"></i>
                  Validar
                </button>
              </div>
            </form>
          </div>
        </section>
      </main>
    <!-- /MAIN HOME -->
@endsection