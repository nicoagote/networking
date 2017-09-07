@extends('layouts.logedLayout')

@section('title')
Home
@endsection
@section('css')
  .input-group{
    margin-top:100px;
  }
@endsection
@section('link')
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
@endsection
@section('contenidoLog')
<!--Search bar-->

<style media="screen">
@import url(//netdna.bootstrapcdn.com/font-awesome/4.0.3/css/font-awesome.css);

body {
  padding: 30px 0px 60px;
}

.margin{
  margin-top: auto;
}

.adelante{
  z-index: 150;
}

.resaltar img:hover{
  opacity: 0.8;
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

  .achicartitulo{
    font-size: 18px;
  }

  .achicardes{
    font-size: 14px;
    padding: 2%;
    margin: auto;
  }

  .separarpencil{
    margin: 3%;
    padding: 3%;
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



<div class="container">
    <div class="row">
        <div class="col-xs-8 col-xs-offset-2">
          <form action="/buscar" method="post">
            {{ csrf_token() }}
            {{ csrf_field() }}
		          <div class="input-group">

                    <!-- <button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown">
                    	<span id="search_concept">Filtrar</span> <span class="caret"></span>
                    </button> -->
                    <select class="form-control" name="show">
                      <option value="both">Buscar Todo</option>
                      <option value="usuario">Usuarios</option>
                      <option value="proyecto">Proyectos</option>
                    </select>
                    <!-- <ul class="dropdown-menu" role="menu">
                      <li><a href="#contains">Proyectos</a></li>
                      <li class="divider"></li>
                      <li><a href="#its_equal">Personas</a></li>
                    </ul> -->

                  <input type="text" class="form-control" name="buscador" placeholder="Search term...">
                  <input type="submit" value="Buscar">
                  <!-- <span class="input-group-btn">
                    <input type="submit" value="Buscar" >
                    <! <button class="btn btn-default" type="button"><span class="glyphicon glyphicon-search"><input type="submit" ></span></button> -->
                  <!-- </span> -->

                </div>
          </form>
      </div>
	</div>
</div>
<div class="row">
  <div class="col-xs-8 col-xs-offset-2">
    <button id="botonBusquedaAvanzada" style="float: right;border: none;background-color: white;">
      Busqueda Avanzada
    </button>
  </div>
</div>
<div id="opcionesBusquedaAvanzada" style="display:none">
    <div class="form-group">
      <ul class="nav nav-tabs justify-content-center">
        <li class="nav-item">
          <a class="nav-link active" href="#">Active</a>
        </li>
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false">Dropdown</a>
          <div class="dropdown-menu">
            <a class="dropdown-item" href="#">Action</a>
            <a class="dropdown-item" href="#">Another action</a>
            <a class="dropdown-item" href="#">Something else here</a>
            <div class="dropdown-divider"></div>
            <a class="dropdown-item" href="#">Separated link</a>
          </div>
        </li>
      </ul>
        {{-- <label class="col-md-4 control-label">Especialidades en las que estas interesado</label> --}}
        {{-- <span class="col-md-6"></span> --}}


      <input type="hidden" id='genericSelectorIdentifier'>

  </div>
</div>

@if ($show == 'both' || $show == 'proyecto')
<div class="container" style="padding-top: 5%;margin-bottom:5%;">
      <div class="row">
        <div class="col-xs-12 col-md-12 col-md-12-offset-2">
            <div class="panel panel-default">
              <div class="panel-heading">
                  <span class="title">Proyectos</span>
              </div>

              <div class="panel-body">
                  <ul class="list-group" id="contact-list">

                      <?php foreach ($proyecto as $project): ?>

                          <li class="list-group-item">
                              <div class="col-xs-12 col-sm-3">
                                  {{Auth::user()->getProfilePicture(125,125)}}
                              </div>
                              <div class="col-xs-12 col-sm-9">

                                <span class="pull-right">

                                    <?php foreach ($project->skills as $skill): ?>

                                          <div class="col-xs-2 col-sm-1" style="float:right" title="<?php echo $skill->name; ?>">

                                            <div class="adelante resaltar" >
                                              <img src="{{$skill->getLogoLocation()}}" alt="{{$skill->getAltOfImage()}}" style="width:50px;">
                                            </div>

                                          </div>

                                    <?php endforeach; ?>

                                </span>

                                <div class="col-xs-12 col-sm-9">
                                    <span class="h3 achicardes"><a href="/proyecto{{$project->id}}">{{$project->title}}</a></span><br/><span class="achicardes">by {{$project->creator->name}} {{$project->creator->surname}}</span>
                                </div>
                                <div class="col-xs-12 col-sm-9">
                                    <span class="small achicardes">
                                      {{$project->short_description}}
                                    </span>
                                </div>
                            </div>
                            <div class="clearfix"></div>
                          </li>

                                      <?php endforeach; ?>
                                      {{$proyecto->links()}}

                </ul>

              </div>

          </div>
        </div>
      </div>

</div>

@endif

@if ($show == 'both' || $show == 'usuario')

<div class="container" style="padding-top: 5%;margin-bottom:5%;">
      <div class="row">
        <div class="col-xs-12 col-md-12 col-md-12-offset-2">
            <div class="panel panel-default">
              <div class="panel-heading">
                  <span class="title">Usuarios</span>
              </div>

              <div class="panel-body">

                  <ul class="list-group" id="contact-list">

                      <?php foreach ($usuarios as $usuario): ?>

                          <li class="list-group-item">
                              <div class="col-xs-12 col-sm-3">
                                  <img src="{{$usuario->getProfilePictureLocation()}}" alt="" class="img-responsive img-circle" />
                              </div>
                              <div class="col-xs-12 col-sm-9">

                                <span class="pull-right">

                                    <?php foreach ($usuario->skills as $skill): ?>

                                          <div class="col-xs-2 col-sm-1 separarpencil" style="float:right" title="<?php echo $skill->name; ?>">

                                            <div class="adelante resaltar">
                                              <img src="{{$skill->getLogoLocation()}}" alt="{{$skill->getAltOfImage()}}" style="width:50px;">
                                            </div>

                                          </div>

                                    <?php endforeach; ?>

                                </span>

                                <div class="col-xs-12">
                                    <span class="h3 achicardes"><a href="/perfil{{$usuario->id}}">{{$usuario->surname}}, {{$usuario->name}} </a></span><br/>
                                </div>
                                <div class="col-xs-12">
                                    <span class="small achicardes">
                                      {{$usuario->description}}
                                    </span>
                                </div>
                            </div>
                            <div class="clearfix"></div>
                          </li>

                                      <?php endforeach; ?>
                                      {{$usuarios->links()}}

                </ul>
              </div>

          </div>
        </div>
      </div>
    </div>

    @endif



<script>
var skillsSelectorsDiv = document.getElementById('skillsSelectors');
  var addSkillButton = document.getElementById('addSkill');
  addSkillButton.counter = 0;

  var genericSelectorIdentifier = document.getElementById('genericSelectorIdentifier');

  var genericSkillSelector = document.getElementById('genericSkillSelector');
  var genericSenioritySelector = document.getElementById('genericSenioritySelector');
  var genericRemoveSkillSelector = document.getElementById('genericRemoveSkillSelector');

  addSkillButton.onclick = function() {
    if (validarSkillSelectors()) {
      var newSkillsSelector = document.createElement('div');
      newSkillsSelector.setAttribute('class', 'col-md-12');
      var newGenericSkillSelector = genericSkillSelector.cloneNode(true);
      var newGenericSenioritySelector = genericSenioritySelector.cloneNode(true);
      var newGenericRemoveSkillSelector = genericRemoveSkillSelector.cloneNode(true);
      var newGenericSelectorIdentifier = genericSelectorIdentifier.cloneNode(true);

      newGenericSkillSelector.removeAttribute('id');
      newGenericSenioritySelector.removeAttribute('id');
      newGenericRemoveSkillSelector.removeAttribute('id');

      newGenericSkillSelector.removeAttribute('class', 'hidden');
      newGenericSenioritySelector.removeAttribute('class', 'hidden');
      newGenericRemoveSkillSelector.removeAttribute('class', 'hidden');

      newGenericSkillSelector.setAttribute('name', 'skill' + this.counter);
      newGenericSenioritySelector.setAttribute('name', 'seniority_level' + this.counter);
      newGenericRemoveSkillSelector.setAttribute('name', 'removeSkillSelector' + this.counter);

      newGenericSkillSelector.setAttribute('class', 'form-control');
      newGenericSenioritySelector.setAttribute('class', 'form-control');
      newGenericRemoveSkillSelector.setAttribute('class', 'btn btn-secondary')

      newGenericSkillSelector.setAttribute('style', 'width:45%;margin:0;display:inline-block;');
      newGenericSenioritySelector.setAttribute('style', 'width:45%;margin:0;display:inline-block;');

      newGenericSkillSelector.setAttribute('id', 'skillSelector' + this.counter);

      newGenericRemoveSkillSelector.onclick =  function() {
        var parentDiv = this.parentNode;
        console.log(parentDiv);
        skillsSelectorsDiv.removeChild(parentDiv);
      }

      newGenericSelectorIdentifier.setAttribute('name', 'skillSelector[]');
      newGenericSelectorIdentifier.setAttribute('type', 'hidden');
      newGenericSelectorIdentifier.setAttribute('value', this.counter);

      newSkillsSelector.appendChild(newGenericSkillSelector);
      newSkillsSelector.appendChild(newGenericSenioritySelector);
      newSkillsSelector.appendChild(newGenericRemoveSkillSelector);
      newSkillsSelector.appendChild(newGenericSelectorIdentifier);

      console.log(newSkillsSelector, this.counter);

      skillsSelectorsDiv.appendChild(newSkillsSelector);

      addSkillButton.counter = addSkillButton.counter + 1;
    }
  }

  function validarSkillSelectors() {
    for (var i = 0; i < addSkillButton.counter + 1; i++) {
      var queryId = 'skillSelector' + i;
      var skillSelector = document.getElementById(queryId);
      console.log(skillSelector);
      if (skillSelector == null) {
      } else if(isNaN(skillSelector.value)) {
        alert('Por favor no dejes vacías especialidades antes de agregar otra.')
        return false;
      } else {
        for (var j = 0; j < addSkillButton.counter; j++) {
          if (i != j) {
            var queryId2 = 'skillSelector' + j;
            var skillSelector2 = document.getElementById(queryId2);
            if (skillSelector2 == null) {
            } else if (skillSelector2.value == skillSelector.value) {
              alert('Por favor no pidas más que una vez la misma especialidad.');
              return false;
            }
          }
        }
      }
    }
    return true
  }
</script>



<script
src="https://code.jquery.com/jquery-3.2.1.min.js"
integrity="sha256-hwg4gsxgFZhOsEEamdOYGBf13FyQuiTwlAQgxVSNgt4="
crossorigin="anonymous">
</script>


<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js">
</script>
<script type="text/javascript">
  $(document).ready(function(e){
    $('.search-panel .dropdown-menu').find('a').click(function(e) {
		e.preventDefault();
		var param = $(this).attr("href").replace("#","");
		var concept = $(this).text();
		$('.search-panel span#search_concept').text(concept);
		$('.input-group #search_param').val(param);
	});
});

var botonBusquedaAvanzada = document.getElementById('botonBusquedaAvanzada');
var opcionesBusquedaAvanzada = document.getElementById('opcionesBusquedaAvanzada');
botonBusquedaAvanzada.onclick = function () {
  if (opcionesBusquedaAvanzada.style.display=='none') {
    opcionesBusquedaAvanzada.style.display='block';
  }else {
    opcionesBusquedaAvanzada.style.display='none';
  }
}
</script>




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
<!--Search bar-->
@endsection
