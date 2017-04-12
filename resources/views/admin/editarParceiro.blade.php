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
            <form class="form__maquinas form flex-grid--wrap col-12 pd-10" data-type-form="default">
              <div class="flex-grid--wrap col-12">
                <span class="font-small bold mg-10--bottom">Nome Fantasia</span>
                <p class="font-small col-12 color-danger hidden" data-message="Nome Fantasia"></p>
                <input class="input col-12" type="text" name="" data-validate="empty" data-name="Nome Fantasia" value="Maria do bolo"/>
              </div>
              <div class="flex-grid--wrap col-12">
                <span class="font-small bold mg-10--bottom">Logo</span>
                <p class="font-small col-12 color-danger hidden" data-message="Logo"></p>
                <input class="input col-12" type="file" name="" data-validate="empty" data-name="Logo" />
              </div>
              <div class="flex-grid--wrap col-12">
                <span class="font-small bold mg-10--bottom">Email</span>
                <p class="font-small col-12 color-danger hidden" data-message="Email"></p>
                <input class="input col-12" type="text" name="" data-validate="empty" data-name="Email" disabled value="mariadosbolos@maria.com" />
              </div>
              <div class="flex-grid--wrap col-12">
                <span class="font-small bold mg-10--bottom">Telefone</span>
                <p class="font-small col-12 color-danger hidden" data-message="Telefone"></p>
                <input class="input col-12" type="text" name="" data-validate="empty" data-name="Telefone" value="(13)3569-4545" />
              </div>
              <div class="flex-grid--wrapp col-12">
                <span class="font-smal bold mg-10--bottom">Status</span>
                <p class="font-small col-12 color-danger hidden" data-message="Status"></p>
                <div class="flex-grid checkbox-switch--success mg-10--bottom mg-10--top">
                  <div class="flex-grid valign-middle checkbox-switch__box col-0">
                    <input id="active-candidatos" class="checkbox-switch__input" name="" type="checkbox" checked />
                    <label for="active-candidatos" class="checkbox-switch__label"></label>
                  </div>
                </div>
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
    <!-- /MAIN HOME -->
@endsection