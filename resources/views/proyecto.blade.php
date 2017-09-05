@extends("layouts.logedLayout")

@section("title")
 Proyecto
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

  .displaynone {
    display: none;
  }
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

<div class="container-fluid">

  <div class="col-md-8 col-xs-12" style="padding-top: 10%;margin-bottom:5%;">
    <div class="panel panel-default">
      <div class="panel-heading h2">{{$proyecto->title}}</div>
      <div class="panel-body">
        {{$proyecto->short_description}}
      </div>

      <div class="panel-body">
        {{$proyecto->long_description}}
      </div>

      <div class="panel-body">
        <ul style="list-style-type:none">
          <?php foreach ($proyecto->skills as $skill): ?>
              <li style="">

                <div class="col-xs-3 col-sm-6">
                    {{$skill->getImage()}}
                    <span class="name"><?php echo $skill->name; ?></span><br/>
                </div>
                <div class="clearfix"></div>

              <li>
          <?php endforeach; ?>

        </ul>
      </div>
    </div>
  </div>

  <div class="col-md-4 col-xs-12" style="padding-top: 10%;margin-bottom:5%;">
    <div class="row">

            <div class="panel panel-default">

              <ul>

                    <li class="list-group-item">
                      <h2>Usuarios que Participan</h2>
                    </li>
                    <br/>

                    <?php foreach ($proyecto->users as $user): ?>

                      <li class="list-group-item">
                          <div class="col-xs-12 col-sm-3">
                              <img src="<?php echo "http://api.randomuser.me/portraits/men/49.jpg"; ?>" alt="" class="img-responsive img-circle" />
                          </div>
                          <div class="col-xs-12 col-sm-9">
                              <span class="name"><?php echo $user->surname .", " . $user->name; ?></span><br/>
                              <span class="username"> <?php echo $user->username; ?><br/></span>
                          </div>
                          <div class="clearfix"></div>
                      </li>

                    <?php endforeach; ?>

                </ul>
              </div>
          </div>
  </div>

</div>

@endsection
