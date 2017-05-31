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
            <h1 class="col light font-30 main-title is-sm">Editar Turista</h1>
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
            
            <form class="form__maquinas form flex-grid--wrap col-12 pd-10" data-type-form="default" action="/Admin/Turista/{{ $turista->id_turista }}" method="POST">
              {{ method_field('PUT') }}
              {{ csrf_field() }}
              
              <div class="flex-grid--wrap col-12">
                <span class="font-small bold mg-10--bottom">Nome do Turista</span>
                <p class="font-small col-12 color-danger hidden" data-message="Nome do Turista"></p> 
                <input class="input col-12" type="text" name="nm_turista" placeholder="Exemplo da Silva Júnior" data-validate="empty"  data-name="Nome do Turista" maxlength="150" value="{{ $turista->nm_turista }}" /> 
              </div>
              <div class="flex-grid--wrap col-12">
                <span class="font-small bold mg-10--bottom">Email</span>
                <p class="font-small col-12 color-danger hidden" data-message="Email"></p> 
                <input class="input col-12" disabled type="text" placeholder="exemplo@exemplo.com" data-validate="empty"  data-name="Email" maxlength="150" value="{{ $turista->email }}" /> 
              </div>
              
              <div class="flex-grid--wrap col-12">
                <span class="font-small bold mg-10--bottom">Data de registro</span>
                <p class="font-small col-12 color-danger hidden" data-message="Data de registro"></p> 
                <input class="input col-12" disabled type="text" data-validate="empty"  data-name="Data de registro" maxlength="150" value="{{ $turista->dt_registro->format('d/m/Y') }}" /> 
              </div>
              
              <div class="flex-grid--wrap col-12">
                <span class="font-small bold mg-10--bottom">Data de Nascimento</span>
                <p class="font-small col-12 color-danger hidden" data-message="Data de nascimento"></p> 
                <input class="input col-12" name="dt_nascimento"  type="text" data-validate="empty"  data-name="Data de nascimento" maxlength="150" value="{{ $turista->dt_nascimento->format('d/m/Y') }}" /> 
              </div>
              
              <div class="flex-grid--wrap col-12">
                <span class="font-small bold mg-10--bottom">CPF</span>
                <p class="font-small col-12 color-danger hidden" data-message="CPF"></p> 
                <input class="input col-12"  disabled type="text" data-validate="empty"  data-name="CPF" maxlength="150" value="{{ $turista->cd_cpf }}" /> 
              </div>
              
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