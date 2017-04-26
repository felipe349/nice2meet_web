@extends('admin.partials.master')

@section('content')
    <!-- MAIN HOME -->
      <main class="main flex-grid col">
        <!-- ASIDE -->
        @include("admin.includes.aside")
        <section class="main__content content home flex-grid--wrap col calign-top">
          <!-- TOP -->
          <div class="flex-grid--row-rev--wrap col-12 calign-top mg-30--bottom">
            <!-- BREADCRUMB -->
            @include('admin.includes.breadcrumb')
            
          <!-- TITLE PAGE -->
            <h1 class="col light font-30 main-title is-sm">Editar Parceiro</h1>
            <p class="col-12 main-message">Os dados com (*) são obrigatórios.</p>
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
            <form class="form__maquinas form flex-grid--wrap col-12 pd-10" data-type-form="default" method="POST" action="/Admin/Parceiro/{{ $parceiro->id_parceiro }}">
              {{ csrf_field() }}
              {{ method_field('PUT') }}
              <div class="flex-grid--wrap col-12">
                <span class="font-small bold mg-10--bottom">Nome Fantasia</span>
                <p class="font-small col-12 color-danger hidden" data-message="Nome Fantasia"></p>
                <input class="input col-12" type="text" name="nm_parceiro" data-validate="empty" data-name="Nome Fantasia" value="{{ old('nm_parceiro', $parceiro->nm_parceiro) }}" maxlength="100" />
              </div>
              <div class="flex-grid--wrap col-12">
                <span class="font-small bold mg-10--bottom">Email</span>
                <p class="font-small col-12 color-danger hidden" data-message="Email"></p>
                <input class="input col-12" type="text" data-validate="empty" data-name="Email" disabled value="{{ $parceiro->email }}" maxlength="150" />
              </div>
              <div class="flex-grid--wrap col-12">
                <span class="font-small bold mg-10--bottom">Telefone</span>
                <p class="font-small col-12 color-danger hidden" data-message="Telefone"></p>
                <input class="input col-12" type="text" name="cd_telefone" data-validate="empty" data-name="Telefone" maxlength='13' required value="{{ old('cd_telefone', $parceiro->cd_telefone) }}" required/>
              </div>
              <div class="flex-grid--wrap col-12">
                <span class="font-small bold mg-10--bottom">Localização</span>
                <input type="hidden" name="cd_latitude" id="cd_latitude" value="{{ old('cd_latitude', $parceiro->cd_latitude) }}" />
                <input type="hidden" name="cd_longitude" id="cd_longitude" value="{{ old('cd_longitude', $parceiro->cd_longitude) }}" />
                <input required id="pac-input" maxlength="100" class="input col-12" type="text" name="nm_endereco" maxlength="250" required value="{{ old('nm_endereco', $parceiro->nm_endereco) }}" />
              </div>
              
              <div id="map" style="width: 650px; height: 400px"></div>
              
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

@section('js-section')
  <script src="/assets/dist/js/maps.min.js"></script>
  <script src="/assets/dist/js/Plugins/jmasked-input.min.js"></script>
  <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCr9xSF0eirrxmlGimDWAR9JB-BjLVC5js&libraries=places&callback=initAutocomplete" async defer></script>
  <script>
    $(document).ready(function(){
      $("[data-name='Telefone']").mask('(99)9999-9999',{placeholder: ''});
    });
  </script>
@endsection