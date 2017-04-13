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
          
          <!-- TITLE PAGE -->
            <h1 class="col light font-30 main-title is-sm">Ofertas</h1>
            <p class="col-12 main-message">Você pode editar ou excluir uma oferta.</p>
          </div>
          <!-- /TOP -->
          
          <div class="flex-grid--wrap content__box--first nopadding col-12">
            <div class="flex-grid--wrap halign-center valign-top col-12 pd-10">
              <h2 class="font-20 light mg-10--bottom color-default col mg-20--right">Gerenciar Ofertas</h2>
              
            </div>
            <p class="bg-info col-12 color-white pd-10 font-smaller">
              <strong>5</strong> registro(s) encontrado(s)
            </p>
            <!-- TABLE LISTAGEM -->
            <table class="table table-striped col-12 responsive-table--lg">
              <thead class="thead">
                <tr class="tr bg-white">
                  <th class="th light pd-10">Título</th>
                  <th class="th light pd-10">Descrição</th>
                  <th class="th light pd-10">Status</th>
                  <th class="th light pd-10">Ações</th>
                  <!--<th class="th light th-nohidden pd-10" data-th="Selecionar todos">-->
                  <!--  <div class="checkbox checkbox--circle flex-grid col-0">-->
                  <!--    <div class="checkbox__group flex-grid" data-group="1">-->
                  <!--      <div class="checkbox__fake fake-default flex-grid">-->
                  <!--        <i class="checkbox__check check-default"></i>-->
                  <!--      </div>-->
                  <!--      <input class="checkbox__hidden" type="checkbox" name=""/>-->
                  <!--    </div>-->
                  <!--  </div>-->
                  <!--</th>-->
                </tr>
              </thead>
              <tbody class="tbody">
                @foreach($ofertas as $oferta)
                  <tr class="tr">
                  <td class="td pd-10" data-th="Título">
                    <p class="col">
                       Título da Oferta
                    </p>
                  </td>
                  <td class="td pd-10" data-th="Descrição">
                    <p class="col">
                      {{ $oferta->ds_oferta }}
                    </p>
                  </td>
                  <td class="td pd-10" data-th="Status">
                    <p class="col">
                      <div class="flex-grid checkbox-switch--success mg-10--bottom mg-10--top">
                        <div class="flex-grid valign-middle checkbox-switch__box col-0">
                          <input id="active-candidatos" class="checkbox-switch__input" name="ic_status_oferta" type="checkbox" @if ($oferta->ic_status_oferta) checked @endif />
                          <label for="active-candidatos" class="checkbox-switch__label"></label>
                        </div>
                      </div>
                    </p>
                  </td>
                  <td class="td pd-10" data-th="Ações">
                    <div class="flex-grid col-0 valign-middle">
                      <a href="/Parceiro/Oferta/editar/{{ $oferta->id_oferta }}" class="btn--success btn-small btn-noborder btn-nomargin font-small col-0 relative">
                        <i class="fa fa-pencil-square-o"></i>
                      </a>
                      <a href="#" class="btn--danger btn-small btn-noborder btn-nomargin font-small col-0 mg-10--left relative">
                        <i class="fa fa-trash-o"></i>
                      </a>
                    </div>
                  </td>
                </tr>
                @endforeach
                
              </tbody>
            </table>
            <!-- TABLE LISTAGEM -->
            <div class="flex-grid col-12 halign-right pd-10">
              
            </div>
          </div>
        </section>
      </main>
    <!-- /MAIN HOME -->
@endsection