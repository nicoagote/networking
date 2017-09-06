@extends('layouts.logedLayout')

@section('title')
Mi perfil - NW
@endsection

@section('contenidoLog')


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

<div class="container" style="padding-top: 10%;margin-bottom:5%;">

  <div class="row">

    <div class="col-xs-12 col-md-8 col-md-offset-2 ">
      <div class="panel panel-default">

          <div class="panel-heading">
              <span class="title">Perfil</span>
              <span class="pull-right c-controls" style="padding-right:5%;">
                <a href="/editarperfil"><span class="glyphicon glyphicon-pencil h2"></a>
              </span>
          </div>

          <div class="panel-body">
            <div class="col-xs-12 col-sm-6" style="padding-top: 3%;">
              <img width="50%"src="<?php echo "http://api.randomuser.me/portraits/men/49.jpg"; ?>" alt="" class="img-responsive img-circle center-block" />
            </div>

            <div class="col-xs-12 col-sm-6" style="padding-top: 3%;">
              <h2>{{$perfil->surname . ", " . $perfil->name}}</h2><br>
              <h3>{{$perfil->username}}</h3>
            </div>

            <div class="col-xs-12">
              <h3>{{$perfil->description}}</h2>
            </div>
          </div>

          <div class="panel-body">

            <div class="col-xs-12 col-sm-6" style="padding-top: 3%;">
              <h3 class="pull-left">{{$perfil->email}}</h2><br>
            </div>

            <div class="col-xs-12 col-sm-6" style="padding-top: 3%;">
              <h3 class="pull-rigth">{{$perfil->phone}}</h2><br>
            </div>

            <div class="col-xs-12 col-sm-6" style="padding-top: 3%;">
              <h2>{{$perfil->curriculum_file_location}}</h2><br>
            </div>

            <!-- <div class="col-xs-12 col-sm-6" style="padding-top: 3%;">
              <h2>{{$perfil->country}}</h2><br>
            </div> -->

            <div class="row col-sm-12">

              <div class="col-sm-1 col-sm-offset-3" title="Ir a su LinkedIn">
                <a href="{{$perfil->linkedin}}"><i class="fa fa-linkedin-square" aria-hidden="true" style="font-size: 6em; text-align:center;"></i>
                </a>
              </div>

              <div class="col-sm-1 col-sm-offset-3" title="Ir a su GitHub">
                <a href="{{$perfil->git}}"><i class="fa fa-github" aria-hidden="true" style="font-size: 6em; text-align:center;"></i>
                </a>
              </div>

            </div>

          </div>

      </div>
    </div>
  </div>

</div>

@endsection
