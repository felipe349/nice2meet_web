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
              <div class="container-login container-login-adm col-6 ">
                <section class="login-adm">
                	<a href="Admin/login" class="titulo-login">Administrador.</div>
                </section>
              </div>
              <!-- /BOX INFO -->
              <!-- BOX INFO -->
              <div class="container-login container-login-parceiro col-6">
                <section class="login-parceiro">
                	<a href="Parceiro/login" class="titulo-login">Parceiro.</div>
                </section>
              </div>
              <!-- /BOX INFO -->
            </div>
            <!-- /BOX WITH 2 -->
            
              
          </div>
        </section>
      </main>
    <!-- /MAIN HOME -->
@endsection