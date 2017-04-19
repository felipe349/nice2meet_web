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
              <strong>{{ $cupons->count() }}</strong> registro(s) encontrado(s)
            </p>
            @if (!$cupons->isEmpty())
              <!-- TABLE LISTAGEM -->
              <table class="table table-striped col-12 responsive-table--lg">
                <thead class="thead">
                  <tr class="tr bg-white">
                    <th class="th light pd-10">Cupom</th>
                    <th class="th light pd-10">Turista</th>
                    <th class="th light pd-10">Email Turista</th>
                    <th class="th light pd-10">Data de criação</th>
                    
                  </tr>
                </thead>
                <tbody class="tbody">
                  @foreach($cupons as $cupom)
                    <tr class="tr">
                    <td class="td pd-10" data-th="Cupom">
                      <p class="col">
                         {{ $cupom->cd_cupom }}
                      </p>
                    </td>
                    <td class="td pd-10" data-th="Turista">
                      <p class="col">
                        {{ $cupom->pontuacao->turista->nm_turista }}
                      </p>
                    </td>
                    <td class="td pd-10" data-th="Email Turista">
                      <p class="col">
                        <a class='link--black' style='color: black' href="mailto:{{ $cupom->pontuacao->turista->email }}">{{ $cupom->pontuacao->turista->email }}</a>
                      </p>
                    </td>
                    <td class="td pd-10" data-th="Data">
                      <p class="col">
                        {{ $cupom->dt_maximo_cupom }}
                      </p>
                    </td>
                  </tr>
                  @endforeach
                </tbody>
              </table>
              <!-- TABLE LISTAGEM -->
            @else
              <span class="alert--info">Você ainda não validou nenhum cupom.</span>
            @endif
            
            <div class="flex-grid halign-center mg-10--top mg-20--bottom">
              <!-- PAGINATION -->
            </div>
          </div>
        </section>
      </main>
    <!-- /MAIN HOME -->

@endsection