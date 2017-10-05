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
                	<div class="titulo-login">Login administrador.</div>
                	<form action="#" method="post" enctype="application/x-www-form-urlencoded">
                    	<input type="text" required title="Username required" placeholder="Username" data-icon="U">
                        <input type="password" required title="Password required" placeholder="Password" data-icon="x">
                        <a href="#" class="enviar">Submit</a>
                    </form>
                </section>
              </div>
              <!-- /BOX INFO -->
              <!-- BOX INFO -->
              <div class="container-login container-login-parceiro col-6">
                <section class="login-parceiro">
                	<div class="titulo-login">Login parceiro.</div>
                	<form action="#" method="post" enctype="application/x-www-form-urlencoded">
                    	<input type="text" required title="Username required" placeholder="Username" data-icon="U">
                        <input type="password" required title="Password required" placeholder="Password" data-icon="x">
                        <a href="#" class="enviar">Submit</a>
                    </form>
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