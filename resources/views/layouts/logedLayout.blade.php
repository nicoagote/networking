<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>NW</title>
    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <style>
    html, body {
      background-color: #fff;
      color: #636b6f;
      font-family: 'Raleway', sans-serif;
      font-weight: 100;
      height: 100vh;
      margin: 0;
    }

    .full-height {
      height: 100vh;
    }

    .flex-center {
      align-items: center;
      display: flex;
      justify-content: center;
    }

    .position-ref {
      position: relative;
    }

    .top-right {
      position: absolute;
      right: 10px;
      top: 18px;
    }

    .content {
      text-align: center;
    }

    .title {
      font-size: 84px;
    }

    .links > a {
      color: #636b6f;
      padding: 0 25px;
      font-size: 12px;
      font-weight: 600;
      letter-spacing: .1rem;
      text-decoration: none;
      text-transform: uppercase;
    }

    .m-b-md {
      margin-bottom: 30px;
    }
    body {
          padding-top: 50px;
          position: relative;
      }

      pre {
          tab-size: 8;
      }
      .image-Perfil{
        display: none;
      }
      #net-working{
        display: block;
      }
      @media screen and (max-width: 768px) {
          .side-collapse-container{
              width:100%;
              position:relative;
              left:0;
              transition:left .4s;
          }
          .side-collapse-container.out{
              left:200px;
          }
          .side-collapse {
              top:50px;
              bottom:0;
              left:0;
              width:200px;
              position:fixed;
              overflow:hidden;
              transition:width .4s;
          }
          .side-collapse.in {
              width:0;
          }
          .image-Perfil{
            display: block;
            width: 94px;
            border-radius: 66px;
            margin-left: 32px;
            margin-top: 10px;
            margin-bottom: 10px;
          }
          #net-working{
            display: none;
          }
      }
    </style>
   </head>
  <body>
    <div class="full-height">

    <!-- nav bar -->
      <header role="banner" class="navbar navbar-fixed-top navbar-inverse">
      <div class="container">
        <div class="navbar-header">
          <button data-toggle="collapse-side" data-target=".side-collapse" data-target-2=".side-collapse-container" type="button" class="navbar-toggle pull-left"><span class="icon-bar"></span><span class="icon-bar"></span><span class="icon-bar"></span></button>
        </div>
        <div class="navbar-inverse side-collapse in">
          <nav role="navigation" class="navbar-collapse">
            <ul class="nav navbar-nav">
              <li><a href="#" id="net-working"><img src="nw.png" alt=""></a></li>
              <li><a href="#" style="text-align:ceter;">
                <span><!-- IMAGEN Y NOMBRE !!!-->
                  <img src="https://image.freepik.com/iconos-gratis/persona-de-negocios-hombre-que-sostiene-una-maleta_318-63795.jpg" class="image-Perfil">
                </span>
                <span>
                  Perfil
                </span>
                </a></li>
              <li><a href="#">Buscar Proyectos</a></li>
              <li><a href="#">Mis Proyectos</a></li>
              <li><a href="/crearproyecto">Crear Proyectos</a></li>
              <li><a href="/contactos">Contactos</a></li>
              <li><a href="#">FAQS</a></li>
              <li>
                  <a href="{{ route('logout') }}"
                      onclick="event.preventDefault();
                               document.getElementById('logout-form').submit();">
                      Cerrar Sesión
                  </a>

                  <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                      {{ csrf_field() }}
                  </form>
              </li>
            </ul>
          </nav>
        </div>
      </div>
    </header>
    </nav>
    <!-- nav bar end -->
    <div class="" style="min-height: 500px;">
      @yield('contenidoLog')
    </div>
    <hr style="
    margin-top: 1rem;
    margin-bottom: 1rem;
    border: 0;
    border-top: 1px solid rgba(0,0,0,.1);
    ">
    <footer style="padding:22px 0;margin-bottom:1rem; margin-top:0;">
      <p class="text-center">© Company 2017</p>
    </footer>
    </div>
    <script
  src="https://code.jquery.com/jquery-3.2.1.min.js"
  integrity="sha256-hwg4gsxgFZhOsEEamdOYGBf13FyQuiTwlAQgxVSNgt4="
  crossorigin="anonymous"></script>

  <script type="text/javascript">
  $(document).ready(function() {
          var sideslider = $('[data-toggle=collapse-side]');
          var sel = sideslider.attr('data-target');
          var sel2 = sideslider.attr('data-target-2');
          sideslider.click(function(event){
              $(sel).toggleClass('in');
              $(sel2).toggleClass('out');
          });
      });
  </script>

  </body>


</html>
