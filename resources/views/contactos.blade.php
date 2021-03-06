@extends("layouts.logedLayout")

@section('title')
Mis contactos - NW
@endsection

@section("contenidoLog")



<style media="screen">
@import url(//netdna.bootstrapcdn.com/font-awesome/4.0.3/css/font-awesome.css);

body {
  padding: 30px 0px 60px;
}

.margin{
  margin-top: auto;
}

.btn-link {
  font-size: 1.5em;
}


.panel > .list-group .list-group-item:first-child {
  /*border-top: 1px solid rgb(204, 204, 204);*/
}

.panel-heading {
  width:100%;
  font-size: 1.5em;
}

.panel-primary{
  padding: 5px;
}


@media (max-width: 767px) {
  .visible-xs {
      display: inline-block !important;
  }

  .pull-rigth{
    display:inline-block;
    width: 100%;
    padding: 5px;
  }

  .block {
      display: block !important;
      width: 100%;
      height: 1px !important;
  }
}
#back-to-bootsnipp {
  position: fixed;
  top: 10px; right: 10px;
}


.c-search > .form-control {
 border-radius: 0px;
 border-width: 0px;
 border-bottom-width: 1px;
 font-size: 1.3em;
 padding: 12px 12px;
 height: 44px;
 outline: none !important;
}
.c-search > .form-control:focus {
  outline:0px !important;
  -webkit-appearance:none;
  box-shadow: none;
}
.c-search > .input-group-btn .btn {
 border-radius: 0px;
 border-width: 0px;
 border-left-width: 1px;
 border-bottom-width: 1px;
 height: 44px;
}


.c-list {
  padding: 0px;
  min-height: 44px;
}
.title {
  display: inline-block;
  font-size: 1.7em;
  font-weight: bold;
  padding: 5px 15px;
}
ul.c-controls {
  list-style: none;
  margin: 0px;
  min-height: 44px;
}

ul.c-controls li {
  margin-top: 8px;
  float: left;
}

ul.c-controls li a {
  font-size: 1.7em;
  padding: 11px 10px 6px;
}
u
l.c-c
ontrols li a i {
min-width: 24px;
text-align: center;
}

ul.c-controls li a:hover {
  background-color: rgba(51, 51, 51, 0.2);
}

.c-toggle {
  font-size: 1.7em;
}

.name {
  font-size: 1.7em;
  font-weight: 700;
}

.c-info {
  padding: 5px 10px;
  font-size: 1.25em;
}
</style>

<div class="container" style="padding-top: 5%;margin-bottom:5%;">

  <div class="row">


      <div class="col-xs-12 col-sm-8">
          <div class="panel panel-default">
              <div class="panel-heading c-list">
                  <span class="title">Mis Contactos</span>
                  <ul class="pull-right c-controls">
                      <li><a href="/homeusuario" data-toggle="tooltip" data-placement="top" title="Añadir Contacto"> <i class="glyphicon glyphicon-plus"></i></a></li>
                  </ul>
              </div>

              <div class="row" style="display: none;">
                  <div class="col-xs-12">
                      <div class="input-group c-search">
                          <input type="text" class="form-control" id="contact-list-search">
                          <span class="input-group-btn">
                              <button class="btn btn-default" type="button"><span class="glyphicon glyphicon-search text-muted"></span></button>
                          </span>
                      </div>
                  </div>
              </div>

              <ul class="list-group" id="contact-list">

              <?php foreach ($contactos as $contacto): ?>

                <li class="list-group-item">
                    <div class="col-xs-12 col-sm-3">
                      {{Auth::user()->getProfilePicture(125,125)}}
                    </div>
                    <div class="col-xs-12 col-sm-9">
                        <span class="name"> <a href="/perfil{{$contacto->id}}"><?php echo $contacto->surname .", " . $contacto->name; ?></a> </span><br/>
                        <span class="username"> <?php echo $contacto->username; ?><br/></span>
                        <span class="email" data-toggle="tooltip" title="<?php echo $contacto->email; ?>"><?php echo $contacto->email; ?><br/></span>
                        <span class="phone" data-toggle="tooltip" title="<?php echo $contacto->phone; ?>"><?php echo $contacto->phone; ?></span>


                    </div>
                    <div class="clearfix"></div>
                </li>

              <?php endforeach; ?>

              </ul>
          </div>
      </div>

      <div class="panel-default panel pull-rigth col-xs-4">
        <div class="panel-heading ">
            <div class="panel panel-primary">Solicitudes de Amistad</div>
            <ul class="list-group" id="contact-list">

            <?php foreach ($solicitudes as $solicitud): ?>

              <li class="list-group-item">
                  <div class="col-xs-12 col-sm-3">
                    {{Auth::user()->getProfilePicture(75,75)}}
                  </div>
                  <div class="col-xs-12 col-sm-9">
                      <span class="subtitle"><a href="/perfil{{$solicitud->id}}"><?php echo $solicitud->surname .", " . $solicitud->name; ?></a></span><br/>
                  </div>
                  <ul class="pull-right c-controls">
                      <form class="" action="/contactos" method="post">
                        {{ csrf_field() }}
                          <button id="friendRequest" name="Añadir Contacto" class="btn btn-link" title="Añadir Contacto" type='submit' data-toggle="tooltip" data-placement="top" >+</button>
                          <input type="hidden" name="request_id" value="{{$solicitud->id}}">
                      </form>
                      <!-- <li><a href="/home"  title="Añadir Contacto"><i ></i></a></li> -->
                  </ul>
                  <div class="clearfix"></div>
              </li>

            <?php endforeach; ?>

            </ul>
        </div>
      </div>

      <div class="panel-default panel pull-rigth col-xs-4">
        <div class="panel-heading ">
            <div class="panel panel-primary">Usuarios Sugeridos</div>


        <ul class="list-group" id="contact-list">

          <div class="panel-body">
            <?php foreach ($usuarios->shuffle()->slice(0,5) as $usuario): ?>

              <li class="list-group-item">
                  <div class="col-xs-12 col-sm-3">
                    {{$usuario->getProfilePicture(70,70)}}
                  </div>
                  <div class="col-xs-12">
                      <span class="subtitle"><a href="/perfil{{$usuario->id}}"><?php echo $usuario->surname .", " . $usuario->name; ?></a></span><br/>
                  </div>
                  <ul class="pull-right c-controls">
                      <form class="" action="/contactos" method="post">
                        {{ csrf_field() }}
                          <button id="sendFriendRequest" name="Añadir Contacto" class="btn btn-link" title="Añadir Contacto" type='submit' data-toggle="tooltip" data-placement="top" >+</button>
                          <input type="hidden" name="send_request_id" value="{{$usuario->id}}">
                      </form>
                      <!-- <li><a href="/home"  title="Añadir Contacto"><i ></i></a></li> -->
                  </ul>
                  <div class="clearfix"></div>
              </li>

            <?php endforeach; ?>
          </div>

        </div>

        </ul>

      </div>


</div>



  <div id="cant-do-all-the-work-for-you" class="modal fade bs-example-modal-sm" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel" aria-hidden="true">
      <div class="modal-dialog modal-sm">
          <div class="modal-content">
              <div class="modal-header">
                  <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                  <h4 class="modal-title" id="mySmallModalLabel">Ooops!!!</h4>
              </div>
              <div class="modal-body">
                  <p>I am being lazy and do not want to program an "Add User" section into this snippet... So it looks like you'll have to do that for yourself.</p><br/>
                  <p><strong>Sorry<br/>
                  ~ Mouse0270</strong></p>
              </div>
          </div>
      </div>
  </div>

  <!-- JavaScrip Search Plugin -->
  <script src="//rawgithub.com/stidges/jquery-searchable/master/dist/jquery.searchable-1.0.0.min.js">
  $(function () {
  /* BOOTSNIPP FULLSCREEN FIX */
  if (window.location == window.parent.location) {
      $('#back-to-bootsnipp').removeClass('hide');
  }


  $('[data-toggle="tooltip"]').tooltip();

  $('#fullscreen').on('click', function(event) {
      event.preventDefault();
      window.parent.location = "http://bootsnipp.com/iframe/4l0k2";
  });
  $('a[href="#cant-do-all-the-work-for-you"]').on('click', function(event) {
      event.preventDefault();
      $('#cant-do-all-the-work-for-you').modal('show');
  })

  $('[data-command="toggle-search"]').on('click', function(event) {
      event.preventDefault();
      $(this).toggleClass('hide-search');

      if ($(this).hasClass('hide-search')) {
          $('.c-search').closest('.row').slideUp(100);
      }else{
          $('.c-search').closest('.row').slideDown(100);
      }
  })

  $('#contact-list').searchable({
      searchField: '#contact-list-search',
      selector: 'li',
      childSelector: '.col-xs-12',
      show: function( elem ) {
          elem.slideDown(100);
      },
      hide: function( elem ) {
          elem.slideUp( 100 );
      }
  })$(function () {
  /* BOOTSNIPP FULLSCREEN FIX */
  if (window.location == window.parent.location) {
      $('#back-to-bootsnipp').removeClass('hide');
  }


  $('[data-toggle="tooltip"]').tooltip();

  $('#fullscreen').on('click', function(event) {
      event.preventDefault();
      window.parent.location = "http://bootsnipp.com/iframe/4l0k2";
  });
  $('a[href="#cant-do-all-the-work-for-you"]').on('click', function(event) {
      event.preventDefault();
      $('#cant-do-all-the-work-for-you').modal('show');
  })
  $('[data-command="toggle-search"]').on('click', function(event) {
      event.preventDefault();
      $(this).toggleClass('hide-search');

      if ($(this).hasClass('hide-search')) {
          $('.c-search').closest('.row').slideUp(100);
      }else{
          $('.c-search').closest('.row').slideDown(100);
      }
  })

  $('#contact-list').searchable({
      searchField: '#contact-list-search',
      selector: 'li',
      childSelector: '.col-xs-12',
      show: function( elem ) {
          elem.slideDown(100);
      },
});
  </script>

</div>


@endsection
