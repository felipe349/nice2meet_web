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
            <h1 class="col light font-30 main-title is-sm">Editar Ponto Turístico</h1>
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
                  {{ $error }}
                @endforeach
              </span>
            @endif
            <form class="form__maquinas form flex-grid--wrap col-12 pd-10" data-type-form="default" method="POST" action="/Admin/PontoTuristico/{{ $ponto->id_ponto_turistico }}">
              {{ csrf_field() }}
              {{ method_field('PUT') }}
              <div class="flex-grid--wrap col-12">
                <span class="font-small bold mg-10--bottom">Nome</span>
                <p class="font-small col-12 color-danger hidden" data-message="Nome"></p>
                <input class="input col-12" type="text" required name="nm_ponto_turistico" data-validate="empty" data-name="Nome"  value="{{ old('nm_ponto_turistico', $ponto->nm_ponto_turistico) }}" maxlength="100" />
              </div>
              <div class="flex-grid--wrap col-12 is-md">
                <span class="font-small bold mg-10--bottom">Descrição</span>
                <p class="font-small col-12 color-danger hidden" data-message="Descrição"></p>
                <textarea class="input col-12" maxlength="150" name="ds_ponto_turistico" maxlength="200" required rows="7" data-validate="empty" data-name="Descrição">{{ old('ds_ponto_turistico', $ponto->ds_ponto_turistico) }}</textarea>
              </div>

              <div class="flex-grid--wrap col-12">
                <span class="font-small bold mg-10--bottom">Localização</span>
                <input type="hidden" name="cd_latitude" id="cd_latitude" value="{{ old('cd_latitude', $ponto->cd_latitude) }}" />
                <input type="hidden" name="cd_longitude" id="cd_longitude" value="{{ old('cd_longitude', $ponto->cd_longitude) }}" />
                <input id="pac-input" class="input col-12" type="text" name="nm_endereco_ponto_turistico" required value="{{ old('nm_endereco_ponto_turistico', $ponto->nm_endereco_ponto_turistico) }}" />
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
  <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCr9xSF0eirrxmlGimDWAR9JB-BjLVC5js&libraries=places&callback=initAutocomplete" async defer></script>
@endsection