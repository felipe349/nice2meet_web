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
          
          <div class="flex-grid--wrap content__box--first nopadding col-12">
            <div class="flex-grid--wrap halign-center valign-top col-12 pd-10">
              <h2 class="font-20 light mg-10--bottom color-default col mg-20--right">Cupons já válidados pelo parceiro</h2>
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
              <strong>200</strong> registro(s) encontrado(s)
            </p>
            <!-- TABLE LISTAGEM -->
            <table class="table table-striped col-12 responsive-table--lg">
              <thead class="thead">
                <tr class="tr bg-white">
                  <th class="th light pd-10">Cupom</th>
                  <th class="th light pd-10">Turista</th>
                  <th class="th light pd-10">Email Turista</th>
                  <th class="th light pd-10">Data</th>
                  
                </tr>
              </thead>
              <tbody class="tbody">
                <tr class="tr">
                  <td class="td pd-10" data-th="Cupom">
                    <p class="col">
                       D$E!e2#
                    </p>
                  </td>
                  <td class="td pd-10" data-th="Turista">
                    <p class="col">
                      Matheus
                    </p>
                  </td>
                  <td class="td pd-10" data-th="Email Turista">
                    <p class="col">
                      <a class='link--black' style='color: black' href="mailto:matheus.galdino@hotmail.com">matheus.galdino@hotmail.com</a>
                    </p>
                  </td>
                  <td class="td pd-10" data-th="Data">
                    <p class="col">
                      12/03/2017
                    </p>
                  </td>
                </tr>
                <tr class="tr">
                  <td class="td pd-10" data-th="Cupom">
                    <p class="col">
                       D$21_e2#
                    </p>
                  </td>
                  <td class="td pd-10" data-th="Turista">
                    <p class="col">
                      Wagner
                    </p>
                  </td>
                  <td class="td pd-10" data-th="Email Turista">
                    <p class="col">
                      <a class='link--black' style='color: black' href="mailto:wagner.ferreira@outlook.com">wagner.ferreira@outlook.com</a>
                    </p>
                  </td>
                  <td class="td pd-10" data-th="Data">
                    <p class="col">
                      12/11/2016
                    </p>
                  </td>
                </tr>
                <tr class="tr">
                  <td class="td pd-10" data-th="Cupom">
                    <p class="col">
                       N32F4!Nd
                    </p>
                  </td>
                  <td class="td pd-10" data-th="Turista">
                    <p class="col">
                      Luiz
                    </p>
                  </td>
                  <td class="td pd-10" data-th="Email Turista">
                    <p class="col">
                      <a class='link--black' style='color: black' href="mailto:luiz.teste@grupo.com">luiz.teste@grupo.com</a>
                    </p>
                  </td>
                  <td class="td pd-10" data-th="Data">
                    <p class="col">
                      12/10/2016
                    </p>
                  </td>
                </tr>
                <tr class="tr">
                  <td class="td pd-10" data-th="Cupom">
                    <p class="col">
                       VFS!e2#
                    </p>
                  </td>
                  <td class="td pd-10" data-th="Turista">
                    <p class="col">
                      Bruna
                    </p>
                  </td>
                  <td class="td pd-10" data-th="Email Turista">
                    <p class="col">
                      <a class='link--black' style='color: black' href="mailto:bruna.cicerelli@yahoo.com">bruna.cicerelli@yahoo.com</a>
                    </p>
                  </td>
                  <td class="td pd-10" data-th="Data">
                    <p class="col">
                      01/09/2016
                    </p>
                  </td>
                </tr>
                <tr class="tr">
                  <td class="td pd-10" data-th="Cupom">
                    <p class="col">
                       D$123fe2#
                    </p>
                  </td>
                  <td class="td pd-10" data-th="Turista">
                    <p class="col">
                      Danielle
                    </p>
                  </td>
                  <td class="td pd-10" data-th="Email Turista">
                    <p class="col">
                      <a class='link--black' style='color: black' href="mailto:matheus.galdino@hotmail.com">dani.salleme@hotmail.com</a>
                    </p>
                  </td>
                  <td class="td pd-10" data-th="Data">
                    <p class="col">
                      01/08/2016
                    </p>
                  </td>
                </tr>
                <tr class="tr">
                  <td class="td pd-10" data-th="Cupom">
                    <p class="col">
                       PQP1!e2#
                    </p>
                  </td>
                  <td class="td pd-10" data-th="Turista">
                    <p class="col">
                      João Silva
                    </p>
                  </td>
                  <td class="td pd-10" data-th="Email Turista">
                    <p class="col">
                      <a class='link--black' style='color: black' href="mailto:email@teste.com">email@teste.com</a>
                    </p>
                  </td>
                  <td class="td pd-10" data-th="Data">
                    <p class="col">
                      01/07/2016
                    </p>
                  </td>
                </tr>
                <tr class="tr">
                  <td class="td pd-10" data-th="Cupom">
                    <p class="col">
                       D$E!123#
                    </p>
                  </td>
                  <td class="td pd-10" data-th="Turista">
                    <p class="col">
                      Salgado
                    </p>
                  </td>
                  <td class="td pd-10" data-th="Email Turista">
                    <p class="col">
                      <a class='link--black' style='color: black' href="mailto:professorsalgado@email.com">professorsalgado@email.com</a>
                    </p>
                  </td>
                  <td class="td pd-10" data-th="Data">
                    <p class="col">
                      01/05/2016
                    </p>
                  </td>
                </tr>
                <tr class="tr">
                  <td class="td pd-10" data-th="Cupom">
                    <p class="col">
                       D$E!e2#
                    </p>
                  </td>
                  <td class="td pd-10" data-th="Turista">
                    <p class="col">
                      Matheus
                    </p>
                  </td>
                  <td class="td pd-10" data-th="Email Turista">
                    <p class="col">
                      <a class='link--black' style='color: black' href="mailto:matheus.galdino@hotmail.com">matheus.galdino@hotmail.com</a>
                    </p>
                  </td>
                  <td class="td pd-10" data-th="Data">
                    <p class="col">
                      12/03/2016
                    </p>
                  </td>
                </tr>
                <tr class="tr">
                  <td class="td pd-10" data-th="Cupom">
                    <p class="col">
                       JK@!!e2#
                    </p>
                  </td>
                  <td class="td pd-10" data-th="Turista">
                    <p class="col">
                      Fernando
                    </p>
                  </td>
                  <td class="td pd-10" data-th="Email Turista">
                    <p class="col">
                      <a class='link--black' style='color: black' href="mailto:fernando_email@gmail.com">fernando_email@gmail.com</a>
                    </p>
                  </td>
                  <td class="td pd-10" data-th="Data">
                    <p class="col">
                      01/04/2016
                    </p>
                  </td>
                </tr>
                <tr class="tr">
                  <td class="td pd-10" data-th="Cupom">
                    <p class="col">
                       D$E@312
                    </p>
                  </td>
                  <td class="td pd-10" data-th="Turista">
                    <p class="col">
                      Felipe
                    </p>
                  </td>
                  <td class="td pd-10" data-th="Email Turista">
                    <p class="col">
                      <a class='link--black' style='color: black' href="mailto:claiohm@gmail.com">claiohm@gmail.com</a>
                    </p>
                  </td>
                  <td class="td pd-10" data-th="Data">
                    <p class="col">
                      01/02/2016
                    </p>
                  </td>
                </tr>
              </tbody>
            </table>
            <!-- TABLE LISTAGEM -->
            
            <div class="flex-grid halign-center mg-10--top mg-20--bottom">
              <!-- PAGINATION -->
            </div>
          </div>
        </section>
      </main>
    <!-- /MAIN HOME -->

@endsection