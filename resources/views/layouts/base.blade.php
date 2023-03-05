<!DOCTYPE html>
<html class="wide wow-animation" lang="en">
  <head>
    <title>Ecu-Aliado</title>
    <meta name="format-detection" content="telephone=no">
    <meta name="viewport" content="width=device-width, height=device-height, initial-scale=1.0, maximum-scale=1.0, user-scalable=0">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta charset="utf-8">
    <link rel="icon" href="{{ asset('assets/images/template/fundacion.png') }}" type="image/x-icon">
    <!-- Stylesheets-->
    <link rel="stylesheet" type="text/css" href="//fonts.googleapis.com/css?family=Montserrat:400,500,600,700%7CPoppins:400%7CTeko:300,400">
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/bootstrap.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/fonts.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/pdf.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/style.css') }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/11.1.10/sweetalert2.min.css" integrity="sha512-cyIcYOviYhF0bHIhzXWJQ/7xnaBuIIOecYoPZBgJHQKFPo+TOBA+BY1EnTpmM8yKDU4ZdI3UGccNGCEUdfbBqw==" crossorigin="anonymous" referrerpolicy="no-referrer" />

    <style>.ie-panel{display: none;background: #212121;padding: 10px 0;box-shadow: 3px 3px 5px 0 rgba(0,0,0,.3);clear: both;text-align:center;position: relative;z-index: 1;} html.ie-10 .ie-panel, html.lt-ie-10 .ie-panel {display: block;}</style>
    
   
</head>
  <body>
    <div class="page">
      <!-- Page Header-->
       <header class="section page-header">
        <!-- RD Navbar-->
        <div class="rd-navbar-wrap">
          <nav class="rd-navbar rd-navbar-corporate" data-layout="rd-navbar-fixed" data-sm-layout="rd-navbar-fixed" data-md-layout="rd-navbar-fixed" data-md-device-layout="rd-navbar-fixed" data-lg-layout="rd-navbar-static" data-lg-device-layout="rd-navbar-fixed" data-xl-layout="rd-navbar-static" data-xl-device-layout="rd-navbar-static" data-xxl-layout="rd-navbar-static" data-xxl-device-layout="rd-navbar-static" data-lg-stick-up-offset="46px" data-xl-stick-up-offset="46px" data-xxl-stick-up-offset="106px" data-lg-stick-up="true" data-xl-stick-up="true" data-xxl-stick-up="true">
            <div class="rd-navbar-collapse-toggle rd-navbar-fixed-element-1" data-rd-navbar-toggle=".rd-navbar-collapse"><span></span></div>
            <div class="rd-navbar-aside-outer">
              <div class="rd-navbar-aside" style="padding: 5px">
                <!-- RD Navbar Panel-->
                <div class="rd-navbar-panel">
                  <!-- RD Navbar Toggle-->
                  <button class="rd-navbar-toggle" data-rd-navbar-toggle=".rd-navbar-nav-wrap"><span></span></button>
                  <!-- RD Navbar Brand-->
                  <div class="rd-navbar-brand">
                    <!--Brand--><a class="brand" href="/"><img  style="padding-left: 8px;" src="{{ asset('assets/images/template/fundacion-Ecu.png') }}" alt=""/></a>
                  </div>
                </div>
                <div class="rd-navbar-aside-right rd-navbar-collapse">
                  <ul class="rd-navbar-corporate-contacts">
                    <li style="	margin-top: 0;margin-left: 25px;">
                      <div class="unit unit-spacing-xs">
                        <div class="unit-left"><span class="icon fa fa-whatsapp"></span></div>
                        <div class="unit-body"><a class="link-phone" href="#">0984198768</a></div>
                      </div>
                    </li>
                    @if(Route::has('login'))
                        @auth
                          @if (Auth::user()->utype === 'ADM')
                          <li style="	margin-top: 0;margin-left: 0px;">
                            <ul class="rd-navbar-nav" style="margin-right: 0px">
                              <li class="rd-nav-item" style="padding: 10px; color:black">
                                <a class="rd-nav-link" href="#" style="margin: 0px;font-size: 13px; color:black; background-color: white">Mi Cuenta (ADMIN)</a>
                                <ul class="rd-menu rd-navbar-dropdown" style="padding: 13px 12px 13px 26px;width: 203px;">
                                 
                                <li class="rd-dropdown-item"><a class="rd-dropdown-link" href="{{ route('admin.slider') }}">Slider</a></li>
                                  <br>
                                  <li class="rd-dropdown-item"><a class="rd-dropdown-link" href="{{ route('admin.eventos') }}">Eventos</a></li>
                                  <br>
                                  <li class="rd-dropdown-item"><a class="rd-dropdown-link" href="{{ route('admin.noticias') }}">Noticias</a></li>
                                  <br>
                                  <li class="rd-dropdown-item"><a class="rd-dropdown-link" href="{{ route('admin.proyectos') }}">Proyectos</a></li>
                                  <br>
                                  <li class="rd-dropdown-item"><a class="rd-dropdown-link" href="{{ route('admin.alianzas') }}">Alianzas</a></li>
                                  <br>
                                  <li class="rd-dropdown-item"><a class="rd-dropdown-link" href="{{ route('admin.mensajes') }}">Mensajes</a></li>
                                  <br>
                                  <li class="rd-dropdown-item"><a class="rd-dropdown-link" href="{{ route('admin.galeria') }}">Galeria</a></li>
                                  <br>
                                  <li class="rd-dropdown-item"><a class="rd-dropdown-link" href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">Salir</a></li>
                                  <form id="logout-form" method="POST" action="{{ route('logout')}}">
                                    @csrf
                                  </form>
                                </ul>
                              </li>
                            </ul>
                          </li>
                          @endif
                        @else
                          <li style="	margin-top: 0; margin-left: 25px;"><a class="icon fas fa-user-tie" href="{{route('login')}}" style="color:black"></a></li>
                        @endif
                    @endif
                  </ul>
                </div>
              </div>
            </div>
            <div class="rd-navbar-main-outer" style="background: #f5f2f2;">
              <div class="rd-navbar-main">
                <div class="rd-navbar-nav-wrap">
                  <!-- RD Navbar Nav-->
                  <ul class="rd-navbar-nav">
                    <li class="rd-nav-item"><a class="rd-nav-link" href="/" style="margin: 0px; background-color: #143F6B;">Inicio</a>
                    </li>
                    <li class="rd-nav-item" style="margin: 0px;background-color: #143F6B;"><a class="rd-nav-link" href="#" style="margin: 0px">Nosotros</a>
                      <ul class="rd-menu rd-navbar-dropdown">
                        <li class="rd-dropdown-item"><a class="rd-dropdown-link" href="/historia">Historia</a></li>
                        <li class="rd-dropdown-item"><a class="rd-dropdown-link" href="/mision-vision-objetivos">Misión, Visión, Objetivos</a></li>
                        <li class="rd-dropdown-item"><a class="rd-dropdown-link" href="/actividades-de-ecualiado">Actividades de Ecu-Aliados</a></li>
                        <li class="rd-dropdown-item"><a class="rd-dropdown-link" href="/lecciones-aprendidas-en-el-trabajo-comunitario">Lecciones aprendidas en el trabajo comunitario</a></li>
                        <li class="rd-dropdown-item"><a class="rd-dropdown-link" href="/transparencia-institucional">Accion Comunitaria</a></li>
                      </ul>
                    </li>
                    <li class="rd-nav-item" style="margin: 0px; background-color: #143F6B;"><a class="rd-nav-link" href="/galeria" style="margin: 0px">Galería</a></li>
                    <li class="rd-nav-item" style="margin: 0px; background-color: #143F6B;"><a class="rd-nav-link" href="#" style="margin: 0px">Servicios</a>
                        <ul class="rd-menu rd-navbar-dropdown">
                          <li class="rd-dropdown-item"><a class="rd-dropdown-link" href="/venta-de-insumos">Venta de insumos</a></li>
                        </ul>
                    </li>
                    <li class="rd-nav-item" style="margin: 0px; background-color: #143F6B;"><a class="rd-nav-link" href="/encuentranos" style="margin: 0px">Información</a>
                    </li>
                  </ul>
                </div>
              </div>
            </div>
          </nav>
        </div>
      </header>

      {{$slot}}

      <!-- Page Footer-->
      <footer class="section footer-corporate context-dark">
        <div class="footer-corporate-bottom-panel">
          <div class="container">
            <div class="row justfy-content-xl-space-berween row-10 align-items-md-center2">
              <div class="col-sm-6 col-md-4 text-sm-right text-md-center">
                <div>
                  <ul class="list-inline list-inline-sm footer-social-list-2">
                <p class="rights"><span>&copy;&nbsp;</span><span class="copyright-year"></span><span>&nbsp;</span>All Rights Reserved. Diseñado por <a href="https://yavirac.edu.ec" target="_blank">Instituto Tecnológico de Turismo y Patrimonio Yavirac</a></p>
                  </ul>
                </div>
              </div>
              <div class="col-sm-6 col-md-4 order-sm-first">
                <!-- Rights-->
              </div>
              <div class="col-sm-6 col-md-4 text-md-right">
              </div>
            </div>
          </div>
        </div>
      </footer>
    </div>
    <!-- Global Mailform Output-->
    <div class="snackbars" id="form-output-global"></div>
    <!-- Javascript-->
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="{{ asset('assets/js/core.min.js') }}" type="text/javascript"></script>
    <script src="{{ asset('assets/js/script.js') }}" type="text/javascript"></script>
    <script src="https://kit.fontawesome.com/314bec7f23.js" crossorigin="anonymous"></script>
    <script>
        function eliminar() {
         Swal.fire({
             icon: 'success',
             title: 'Eliminado',
             text: 'Eliminado con éxito',
             showConfirmButton: false,
             timer: 2000,
             timerProgressBar: true,
         });
        }
    </script>
    <script>
      $('.formulario-guardar').submit(function(e){
        e.preventDefault();
        Swal.fire({
             icon: 'success',
             title: 'Guardado',
             text: 'Guardado con éxito',
             showConfirmButton: false,
             timer: 2000,
             timerProgressBar: true,
         });
      })
    </script>
    <script>
      $('.formulario-actualizar').submit(function(e){
        e.preventDefault();
        Swal.fire({
             icon: 'success',
             title: 'Actualizado',
             text: 'Actualizado con éxito',
             showConfirmButton: false,
             timer: 2000,
             timerProgressBar: true,
         });
      })
    </script>
    <script src="https://cdn.tiny.cloud/1/kmc20rs7xxh7uyn2k5qm8axj7hegbls3hyvoekuom0ft18sz/tinymce/5/tinymce.min.js" referrerpolicy="origin"></script>
    @livewireScripts
    @stack('scripts')
  </body>
</html>
