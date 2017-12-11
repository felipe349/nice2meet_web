@extends('admin.partials.master')

@section('content')
    <!-- MAIN HOME -->
      <main class="main flex-grid col">
        <!-- ASIDE -->
        <section class="main__content home flex-grid--wrap col calign-top container-logins-index">
          <div class="col-12">
            <!-- BOX WITH 2 -->
            
            <div  class="flex-grid--wrap">
              <!-- BOX INFO -->
              <div class="container-login col-6 col-is-sm-12 mg-20--top">
                <div class=" col-6 col-is-sm-12  container-container-login">
                <a href="Admin/login" style="text-decoration: none;"><div class="box-infos--first  flex-grid" >
                  <div class="box-infos__icon flex-grid valign-middle col-0">
                    <i class="fa fa-user-secret"></i>
                  </div>
                  <div class="box-infos__content col flex-grid valign-middle">
                    <h3 class="box-infos__title color-default light" style="font-size:2rem">Administrador</h3>
                    
                  </div>
                </div></a></div>
              </div>
              <div class="container-login col-6 col-is-sm-12 mg-20--top">
                <div class=" col-6 col-is-sm-12  container-container-login">
                <a href="Parceiro/login" style="text-decoration: none;"><div class="box-infos--info  flex-grid" >
                  <div class="box-infos__icon flex-grid valign-middle col-0">
                    <i class="fa fa-black-tie"></i>
                  </div>
                  <div class="box-infos__content col flex-grid valign-middle">
                    <h3 class="box-infos__title color-default light" style="font-size:2rem">Parceiro</h3>
                    
                  </div>
                </div></a></div>
              </div>
              
              
              <!-- /BOX INFO -->
              <!-- BOX INFO -->
              
              <!-- /BOX INFO -->
            </div>
            <!-- /BOX WITH 2 -->
            
              
          </div>
        </section>
      </main>
    <!-- /MAIN HOME -->
@endsection