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
            <h1 class="col light font-30 main-title is-sm">Turistas</h1>
          </div>
          <!-- /TOP -->
          
          <div class="flex-grid--wrap content__box--first nopadding col-12">
            <div class="flex-grid--wrap halign-center valign-top col-12 pd-10">
              <h2 class="font-20 light mg-10--bottom color-default col mg-20--right">Gerenciar Turistas</h2>
            </div>
            <p class="bg-info col-12 color-white pd-10 font-smaller">
              <strong>2</strong> registro(s) encontrado(s)
            </p>
            <!-- TABLE LISTAGEM -->
            <table class="table table-striped col-12 responsive-table--lg">
              <thead class="thead">
                <tr class="tr bg-white">
                  <th class="th light pd-10">Nome</th>
                  <th class="th light pd-10">Email</th>
                  <th class="th light pd-10">Status</th>
                  <th class="th light pd-10">Ações</th>
                </tr>
              </thead>
              <tbody class="tbody">
                <tr class="tr">
                  <td class="td pd-10" data-th="Nome">
                    <p class="col">
                      Jake
                    </p>
                  </td>
                  <td class="td pd-10" data-th="Email">
                    <p class="col">
                      jake@adventuretime.com
                    </p>
                  </td>
                  <td class="td pd-10" data-th="Localização">
                    <p class="col">
                      Praça 19 de Janeiro - Boqueirão, Praia Grande - SP
                    </p>
                  </td>
                  <td class="td pd-10" data-th="Status">
                    <p class="col">
                      <div class="flex-grid checkbox-switch--success mg-10--bottom mg-10--top">
                        <div class="flex-grid valign-middle checkbox-switch__box col-0">
                          <input id="active-candidatos" class="checkbox-switch__input" name="" type="checkbox" checked />
                          <label for="active-candidatos" class="checkbox-switch__label"></label>
                        </div>
                      </div>
                    </p>
                  </td>
                  <td class="td pd-10" data-th="Ações">
                    <div class="flex-grid col-0 valign-middle">
                      <a href="#" class="btn--success btn-small btn-noborder btn-nomargin font-small col-0 relative">
                        <i class="fa fa-pencil-square-o"></i>
                      </a>
                    </div>
                  </td>
                </tr>
              </tbody>
            </table>
          </div>
        </section>
      </main>
    <!-- /MAIN HOME -->
@endsection