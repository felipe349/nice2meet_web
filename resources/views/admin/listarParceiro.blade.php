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
            

                <!-- MAIN HOME -->
      <main class="main flex-grid col">
        <!-- ASIDE -->
        <?php include("includes/aside.php"); ?>
        <section class="main__content content home flex-grid--wrap col calign-top">
          <!-- TOP -->
          <div class="flex-grid--row-rev--wrap col-12 calign-top mg-30--bottom">
            <!-- BREADCRUMB -->
            <?php include("includes/breadcrumb.php"); ?>
            
            <!-- TITLE PAGE -->
            <h1 class="col light font-30 main-title is-sm">Pontos Turísticos</h1>
          </div>
          <!-- /TOP -->
          
          <div class="flex-grid--wrap content__box--first nopadding col-12">
            <div class="flex-grid--wrap halign-center valign-top col-12 pd-10">
              <h2 class="font-20 light mg-10--bottom color-default col mg-20--right">Gerenciar Pontos Turísticos</h2>
              <!--<form class="form-search--first flex-grid--wrap col-0" method="post">-->
              <!--  <input class="form-search__input col" type="text" name="titulo" placeholder="Filtrar por..." />-->
              <!--  <select class="form-search__select col" name="tipo">-->
              <!--    <option value="" selected disabled>TIPO</option>-->
              <!--    <option value="1">EMPILHADEIRA</option>-->
              <!--  </select>-->
              <!--  <button class="form-search__btn col-0 is-sm" type="submit">-->
              <!--    FILTRAR-->
              <!--  </button>-->
              <!--</form>-->
            </div>
            <p class="bg-info col-12 color-white pd-10 font-smaller">
              <strong>5</strong> registro(s) encontrado(s)
            </p>
            <!-- TABLE LISTAGEM -->
            <table class="table table-striped col-12 responsive-table--lg">
              <thead class="thead">
                <tr class="tr bg-white">
                  <th class="th light pd-10">Título</th>
                  <th class="th light pd-10">Endereço</th>
                  <th class="th light pd-10">Status</th>
                  <th class="th light pd-10">Ações</th>
                </tr>
              </thead>
              <tbody class="tbody">
                <tr class="tr">
                  <td class="td pd-10" data-th="Título">
                    <p class="col">
                      Sesquicentenário da Independência
                    </p>
                  </td>
                  <td class="td pd-10" data-th="Endereço">
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
                <tr class="tr">
                  <td class="td pd-10" data-th="Título">
                    <p class="col">
                      Ponte Pensil de São Vicente
                    </p>
                  </td>
                  <td class="td pd-10" data-th="Endereço">
                    <p class="col">
                      Parque Bitaru, São Vicente - SP
                    </p>
                  </td>
                  <td class="td pd-10" data-th="Status">
                    <p class="col">
                      <div class="flex-grid checkbox-switch--success mg-10--bottom mg-10--top">
                        <div class="flex-grid valign-middle checkbox-switch__box col-0">
                          <input id="active-candidatos" class="checkbox-switch__input" name="" type="checkbox" checked/>
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
                <tr class="tr">
                  <td class="td pd-10" data-th="Título">
                    <p class="col">
                      Ponto do Mirante
                    </p>
                  </td>
                  <td class="td pd-10" data-th="Endereço">
                    <p class="col">
                      Av. Getúlio Vargas, 109 - Morro dos Barbosas, São Vicente - SP
                    </p>
                  </td>
                  <td class="td pd-10" data-th="Status">
                    <p class="col">
                      <div class="flex-grid checkbox-switch--success mg-10--bottom mg-10--top">
                        <div class="flex-grid valign-middle checkbox-switch__box col-0">
                          <input id="active-candidatos" class="checkbox-switch__input" name="" type="checkbox" />
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
                <tr class="tr">
                  <td class="td pd-10" data-th="Título">
                    <p class="col">
                      Porto de Santos
                    </p>
                  </td>
                  <td class="td pd-10" data-th="Endereço">
                    <p class="col">
                       Av. Conselheiro Rodrigues Alves, S/N - Macuco, Santos - SP
                    </p>
                  </td>
                  <td class="td pd-10" data-th="Status">
                    <p class="col">
                      <div class="flex-grid checkbox-switch--success mg-10--bottom mg-10--top">
                        <div class="flex-grid valign-middle checkbox-switch__box col-0">
                          <input id="active-candidatos" class="checkbox-switch__input" name="" type="checkbox" />
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
                <tr class="tr">
                  <td class="td pd-10" data-th="Título">
                    <p class="col">
                      Gruta Nossa Senhora de Lourdes
                    </p>
                  </td>
                  <td class="td pd-10" data-th="Endereço">
                    <p class="col">
                      R. Santa Catarina - José Menino, Santos - SP
                    </p>
                  </td>
                  <td class="td pd-10" data-th="Status">
                    <p class="col">
                      <div class="flex-grid checkbox-switch--success mg-10--bottom mg-10--top">
                        <div class="flex-grid valign-middle checkbox-switch__box col-0">
                          <input id="active-candidatos" class="checkbox-switch__input" name="" type="checkbox" checked/>
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