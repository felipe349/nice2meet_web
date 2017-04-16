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
            <h1 class="col light font-30 main-title is-sm">Parceiro - Oferta</h1>
          </div>
          <!-- /TOP -->
          
          <div class="flex-grid--wrap content__box--second nopadding col-12">
            <h2 class="font-20 light pd-10 color-default col-12">Editar Oferta</h2>
            @if(\Session::has('mensagem'))
              <span class="alert--{{ \Session::get('mensagem')['class'] }}">
                {{ \Session::get('mensagem')['text'] }}
              </span>
            @endif
            <form class="form__maquinas form flex-grid--wrap col-12 pd-10" data-type-form="default" method="POST" action="/Parceiro/Oferta/editar">
              {{ csrf_field() }}
              {{ method_field('PUT') }}
              <input type="hidden" name="id_oferta" value="{{ $oferta->id_oferta }}" />
              <div class="flex-grid--wrap col-12">
                <span class="font-small bold mg-10--bottom">Título</span>
                <p class="font-small col-12 color-danger hidden" data-message="Referência"></p>
                <input class="input col-12" type="text" name="nm_oferta" data-validate="empty" data-name="Referência" value='{{ old("nm_oferta", $oferta->nm_oferta) }}' />
              </div>
              <div class="flex-grid--wrap col-12 is-md">
                <span class="font-small bold mg-10--bottom">Descrição</span>
                <p class="font-small col-12 color-danger hidden" data-message="Descrição"></p>
                <textarea class="input col-12" name="ds_oferta" rows="7" data-validate="empty" data-name="Descrição">{{ old('ds_oferta', $oferta->ds_oferta) }}</textarea>
              </div>
              <div class="flex-grid--col col-0 is-sm mg-10--bottom">
                <span class="font-small bold mg-10--bottom col">Deseja definir como oferta vigente?</span>
                <p class="font-small col-0 color-danger hidden" data-message="Home"></p>
                <div class="radiobox flex-grid col-0 bg-white">
                  <div class="radiobox__group flex-grid valign-middle mg-20--right col-0">
                    <div class="radiobox__fake fake-second flex-grid col-0">
                        <span class="radiobox__check check-second" @if ($oferta->ic_status_oferta) style="display: block;" @endif></span>
                    </div>
                      <input class="radiobox__hidden" type="radio" name="ic_status_oferta" value="1" data-validate="radio" data-name="Home" @if ($oferta->ic_status_oferta) checked @endif />
                    <span class="color-second mg-10--left">Sim</span>
                  </div>
                  <div class="radiobox__group flex-grid valign-middle mg-20--right col-0">
                      <div class="radiobox__fake fake-second flex-grid col-0">
                          <span class="radiobox__check check-second" @if (!$oferta->ic_status_oferta) style="display: block;" @endif></span>
                      </div>
                      <input class="radiobox__hidden" type="radio" name="ic_status_oferta" value="0" data-validate="radio" data-name="Home" @if (!$oferta->ic_status_oferta) checked @endif />
                      <span class="color-second mg-10--left">Não</span>
                  </div>
                </div>
              </div>
              <div class="flex-grid col-12">
                <button type="submit" class="col-0 btn--second btn-nomargin is-sm mg-10--top">
                  <i class="fa fa-upload fa-left"></i>
                  Editar
                </button>
              </div>
            </form>
          </div>
        </section>
      </main>
    <!-- /MAIN HOME -->
@endsection