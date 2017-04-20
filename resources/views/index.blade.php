@extends('admin.partials.master')

@section('content')
    <!-- MAIN HOME -->
      <main class="main flex-grid col">
        <!-- ASIDE -->
        <section class="main__content home flex-grid--wrap col calign-top">
          <div class="flex-grid--row-rev--wrap col-12 calign-top">
            
            
            <!-- TITLE PAGE -->
            <h1 class="col light font-30 main-title is-sm">Nice2Meet</h1>
            <p class="col-12 main-message">Todas as funcionalidades administrativas em um só lugar</p>
          </div>
          <div class="flex-grid--wrap col-12">
            <!-- BOX WITH 2 -->
            <div class="flex-grid--wrap col is-lg teste">
              <!-- BOX INFO -->
              <div style="margin-left:8.33333333%;" class="box-infos--first mg-20--top flex-grid col is-md  col-4 ">
                <div class="box-infos__icon flex-grid valign-middle col-0">
                  <i class="fa fa-user-circle"></i>
                </div>
                <div class="box-infos__content col">
                  <h3 class="box-infos__title color-default light">Login </h3>
                  <span class="box-infos__number strong font-20 bold">Administrador</span>
                  
                </div>
              </div>
              <!-- /BOX INFO -->
              <!-- BOX INFO -->
              <div style="margin-left:16.66666667%;" class="box-infos--second mg-20--top flex-grid col mg-10--left is-md col-4">
                <div class="box-infos__icon flex-grid valign-middle col-0">
                  <i class="fa fa-user-circle"></i>
                </div>
                <div class="box-infos__content col">
                  <h3 class="box-infos__title color-default light">Login</h3>
                  <span class="box-infos__number strong font-20 bold">Parceiro</span>
                  
                </div>
              </div>
              <!-- /BOX INFO -->
            </div>
            <!-- /BOX WITH 2 -->
            
              
          </div>
        </section>
      </main>
    <!-- /MAIN HOME -->
@endsection