@extends('parceiro.partials.master')

@section('content')
    <main class="main flex-grid col">
        <!-- ASIDE -->
        @include('parceiro.includes.aside')
        <section class="main__content content home flex-grid--wrap col calign-top">
          <!-- TOP -->
          <div class="flex-grid--row-rev--wrap col-12 calign-top mg-30--bottom">
            <!-- BREADCRUMB -->
            @include('parceiro.includes.breadcrumb')
            
            <!-- TITLE PAGE -->
            <h1 class="col light font-30 main-title is-sm">Dados Pessoais</h1>
            <p class="col-12 main-message">Os dados com (*) são obrigatórios.</p>
          </div>
          <!-- /TOP -->
          
          <div class="flex-grid--wrap content__box--second nopadding col-12">
            <form class="form__maquinas form flex-grid--wrap col-12 pd-10" data-type-form="default">
              <div class="flex-grid--wrap col-12">
                <span class="font-small bold mg-10--bottom">Nome Fantasia</span>
                <p class="font-small col-12 color-danger hidden" data-message="Nome Fantasia"></p>
                <input class="input col-12" type="text" name="nm_parceiro" data-validate="empty" data-name="Nome Fantasia" value="{{ old('nm_parceiro', $parceiro->nm_parceiro) }}"  />
              </div>
              <div class="flex-grid--wrap col-12">
                <span class="font-small bold mg-10--bottom">Email</span>
                <p class="font-small col-12 color-danger hidden" data-message="Email"></p>
                <input class="input col-12" type="text" name="email" data-validate="empty" data-name="Email" value="{{ old('email', $parceiro->email) }}" disabled/>
              </div>
              <div class="flex-grid--wrap col-12">
                <span class="font-small bold mg-10--bottom">Telefone</span>
                <p class="font-small col-12 color-danger hidden" data-message="Telefone"></p>
                <input class="input col-12" type="text" name="cd_telefone" data-validate="empty" data-name="Telefone" value="{{ old('cd_telefone', $parceiro->cd_telefone) }}" />
              </div>
              <div class="flex-grid--wrap col-12">
                <span class="font-small bold mg-10--bottom">Localização</span>
                <input id="pac-input" class="input col-12" type="text" />
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
@endsection

@section('js-section')
  <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCr9xSF0eirrxmlGimDWAR9JB-BjLVC5js&libraries=places&callback=initAutocomplete" async defer></script>
  <script src="/assets/dist/js/maps.min.js"></script>
  
@endsection