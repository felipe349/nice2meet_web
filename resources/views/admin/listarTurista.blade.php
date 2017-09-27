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
              <strong>{{ $turistas->total() }}</strong> registro(s) encontrado(s)
            </p>
            @if(!$turistas->isEmpty())
            <!-- TABLE LISTAGEM -->
              <table class="table table-striped col-12 responsive-table--lg">
              <thead class="thead">
                <tr class="tr bg-white">
                  <th class="th light pd-10">Nome</th>
                  <th class="th light pd-10">Email</th>
                  <th class="th light pd-10">Editar</th>
                </tr>
              </thead>
              <tbody class="tbody">
                @foreach($turistas as $turista)
                <tr class="tr">
                  <td class="td pd-10" data-th="Nome">
                    <p class="col">
                      {{$turista->nm_turista}}
                    </p>
                  </td>
                  <td class="td pd-10" data-th="Email">
                    <p class="col">
                      {{$turista->nm_email_turista}}
                    </p>
                  </td>
                  <td class="td pd-10" data-th="Ações">
                    <div class="flex-grid col-0 valign-middle">
                      <a href="/Admin/Turista/{{ $turista->id_turista }}" class="btn--success btn-small btn-noborder btn-nomargin font-small col-0 relative">
                        <i class="fa fa-pencil-square-o"></i>
                      </a>
                    </div>
                  </td>
                </tr>
                @endforeach
              </tbody>
            </table>
            <style type="text/css">
              .wrapper {
                display: -webkit-flex;
                display: flex;
                -webkit-align-items: center;
                align-items: center;
                -webkit-justify-content: center;
                justify-content: center;
              }
              .pagination-box li{
                display:inline-block;
              }
            </style>
                <div class="wrapper pagination-box">{!! $turistas->links() !!}</div>
                  
               
            
            <!-- /Fim da table listagem -->
            @else
              <span class="alert--info">Não há nenhum turista cadastrado.</span>
            @endif
          </div>
        </section>
      </main>
    <!-- /MAIN HOME -->
@endsection