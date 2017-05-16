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
            <h1 class="col light font-30 main-title is-sm">Quiz</h1>
          </div>
          <!-- /TOP -->
          
          <div class="flex-grid--wrap content__box--first nopadding col-12">
            <div class="flex-grid--wrap halign-center valign-top col-12 pd-10">
              <h2 class="font-20 light mg-10--bottom color-default col mg-20--right">Gerenciar Quiz</h2>
            </div>
            <p class="bg-info col-12 color-white pd-10 font-smaller">
              <strong>{{ $quiz->total() }}</strong> registro(s) encontrado(s)
            </p>
            
            @if (!$quiz->isEmpty())
              <!-- TABLE LISTAGEM -->
              <table class="table table-striped col-12 responsive-table--lg">
                <thead class="thead">
                  <tr class="tr bg-white">
                    <th class="th light pd-10">ID do Quiz</th>
                    <th class="th light pd-10">Quantidade de perguntas</th>
                    <th class="th light pd-10">Ponto Turístico do Quiz</th>
                    <th class="th light pd-10">Ações</th>
                  </tr>
                </thead>
                <tbody class="tbody">
                  @foreach($quiz as $q)
                    <tr class="tr">
                    <td class="td pd-10" data-th="Nome Fantasia">
                      <p class="col">
                        {{ $q->id_quiz }}
                      </p>
                    </td>
                    <td class="td pd-10" data-th="Descrição">
                      <p class="col">
                        {{ $q->qt_questao }}
                      </p>
                    </td>
                    <td class="td pd-10" data-th="Localização">
                      <p class="col">
                        {{ $q->pontoTuristico->nm_ponto_turistico }}
                      </p>
                    </td>
                    <td class="td pd-10" data-th="Ações">
                      <div class="flex-grid col-0 valign-middle">
                        <a href="/Admin/Quiz/{{ $q->id_quiz }}" class="btn--success btn-small btn-noborder btn-nomargin font-small col-0 relative">
                          <i class="fa fa-pencil-square-o"></i>
                        </a>
                        <button data-name="deletar-oferta" class="btn--danger btn-small btn-noborder btn-nomargin font-small col-0 mg-10--left relative">
                        <i class="fa fa-trash-o"></i>
                      </button>
                      </div>
                    </td>
                  </tr>
                  @endforeach
                </tbody>
              </table>
              {!! $quiz->links() !!}
              <!-- /Fim Table Listagem -->
            @else
              <span class="alert--info">Não há nenhum quiz cadastrado.</span>
            @endif
          </div>
        </section>
      </main>
    <!-- /MAIN HOME -->
@endsection