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
    </style>
   </head>
  <body>
    <div class="full-height">

    <!-- nav bar -->
    <nav class="navbar navbar-toggleable-md navbar-inverse bg-inverse">
      <div class="container">
        @if (Auth::check())

        @else
          <a class="navbar-brand" href="/"><img src="nw.png" alt=""></a>
          <a href="{{ url('/login') }}" class="pull-right navbar-brand">Entrá</a>
          <a href="{{ url('/register') }}" class="pull-right navbar-brand">Registrate</a>
        @endif
        </div>
    </nav>
    <!-- nav bar end -->
    <div class="" style="min-height: 500px;">
      @yield('contenido')
    </div>
  </body>
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

</html>
