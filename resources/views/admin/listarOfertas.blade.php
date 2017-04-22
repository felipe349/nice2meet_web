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
            <h1 class="col light font-30 main-title is-sm">Ofertas</h1>
          </div>
          <!-- /TOP -->
          
          <div class="flex-grid--wrap content__box--first nopadding col-12">
            <div class="flex-grid--wrap halign-center valign-top col-12 pd-10">
              <h2 class="font-20 light mg-10--bottom color-default col mg-20--right">Gerenciar Ofertas</h2>
            </div>
            
            <p class="bg-info col-12 color-white pd-10 font-smaller">
              <strong>{{ $ofertas->total() }}</strong> registro(s) encontrado(s)
            </p>
            @if(!$ofertas->isEmpty())
            <!-- TABLE LISTAGEM -->
              <table class="table table-striped col-12 responsive-table--lg">
              <thead class="thead">
                <tr class="tr bg-white">
                  <th class="th light pd-10">Nome</th>
                  <th class="th light pd-10">Descrição</th>
                  <th class="th light pd-10">Parceiro</th>
                  <th class="th light pd-10">Editar</th>
                </tr>
              </thead>
              <tbody class="tbody">
                @foreach($ofertas as $oferta)
                <tr class="tr">
                  <td class="td pd-10" data-th="Nome">
                    <p class="col">
                      {{ $oferta->nm_oferta }}
                    </p>
                  </td>
                  <td class="td pd-10" data-th="Descrição">
                    <p class="col">
                      {{ $oferta->ds_oferta }}
                    </p>
                  </td>
                  <td class="td pd-10" data-th="Parceiro">
                    <p class="col">
                      {{ $oferta->parceiro->nm_parceiro }}
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
                @endforeach
              </tbody>
            </table>
            {!! $ofertas->links() !!}
            <!-- /Fim da table listagem -->
            @else
              <span class="alert--info">Não há nenhuma oferta ativa.</span>
            @endif
          </div>
        </section>
      </main>
    <!-- /MAIN HOME -->
@endsection