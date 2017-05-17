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
            <h1 class="col light font-30 main-title is-sm">Cadastrar Quiz</h1>
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
            
            <form class="form__maquinas form flex-grid--wrap col-12 pd-10" data-type-form="default" action="/Admin/Quiz/Cadastrar" method="POST">
              {{ csrf_field() }}
              <div class="flex-grid--wrap col-12">
                <span class="font-small bold mg-10--bottom">Nome do ponto turístico</span>
                <p class="font-small col-12 color-danger hidden" data-message="Nome do ponto turístico"></p> 
                <select name="id_ponto_turistico" class="input col-12">
                  @foreach($ponto as $p)
                    <option value="{{ $p->id_ponto_turistico }}">{{ $p->nm_ponto_turistico }}</option>
                  @endforeach
                </select> 
              </div>
              <div class="flex-grid--wrap col-12">
                <span class="font-small bold mg-10--bottom">Pergunta</span>
                <p class="font-small col-12 color-danger hidden" data-message="Pergunta"></p> 
                <input class="input col-12" type="text" name="nm_questao" placeholder="Por exemplo: Em que ano a Torre Eiffel foi inaugurada?" data-validate="empty"  data-name="Pergunta" maxlength="150" value="{{ $quiz->questaoQuiz->questao->nm_questao }}" /> 
              </div>
              
              <div class="flex-grid--wrap col-12 checkbox-switch--success">
                <span class="font-small bold mg-10--bottom col-12">Respostas</span>
                @for($i = 0; $i < count($respostas); $i++)
                  <input required class="input col-9" type="text" name="ds_resposta_questao[]" placeholder="Alternativa A" data-validate="empty"  data-name="Resposta" maxlength="100" value="{{ $respostas[$i]->ds_resposta_questao }}" />
                  &nbspCORRETA <input type="radio" name="ic_resposta_correta[]" value="{{ $i+1 }}" @if($respostas[$i]->ic_resposta_correta) checked @endif class="radio" style="margin-top:8px;margin-left:10px"/>
                @endfor
              </div>
              
              <div class="flex-grid col-12">
                <button type="submit" class="col-0 btn--second btn-nomargin is-sm mg-10--top">
                  <i class="fa fa-upload fa-left"></i>
                  Cadastrar
                </button>
              </div>
            </form>
          </div>
        </section>
      </main>
    <!-- /MAIN HOME -->
@endsection
