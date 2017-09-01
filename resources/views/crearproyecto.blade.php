@extends("layouts.welcomeLayout")

@section("contenido")

  <div class="container"style="padding-top: 10%;margin-bottom:5%;">
      <div class="row">
          <div class="col-md-8 col-md-offset-2">
              <div class="panel panel-default">
                  <div class="panel-heading">Crear Proyecto</div>
                  <div class="panel-body">
                      <form class="form-horizontal" method="POST" action="{{ route('login') }}">
                          {{ csrf_field() }}

                          <div class="form-group">
                              <label for="title" class="col-md-4 control-label">Titulo</label>

                              <div class="col-md-6">
                                  <input type="text" class="form-control" name="title" required>
                              </div>
                          </div>

                          <div class="form-group">
                              <label for="short_description" class="col-md-4 control-label">Descripcion</label>

                              <div class="col-md-6">
                                <textarea name="short_description" cols="40" rows="5" class="form-control" required autofocus ></textarea>
                              </div>
                          </div>

                          <div class="form-group">
                              <label for="long_description" class="col-md-4 control-label">Descripcion Larga</label>

                              <div class="col-md-6">
                                <textarea name="long_description" cols="40" rows="10" class="form-control" required autofocus ></textarea>
                              </div>
                          </div>

                          <div class="form-group">
                              <label for="active" class="col-md-4 control-label">Activo</label>

                              <div class="col-md-6">
                                <input type="checkbox" name="active" value="">
                              </div>
                          </div>



                          <div class="form-group">
                              <div class="col-md-8 col-md-offset-4">
                                  <button type="submit" class="btn btn-primary">
                                      Crear
                                  </button>
                              </div>
                          </div>
                      </form>
                  </div>
              </div>
          </div>
      </div>
  </div>
@endsection
