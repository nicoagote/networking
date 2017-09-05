@extends("layouts.logedLayout")

@section("title")
 Editar perfil
@endsection

@section("contenidoLog")

<div class="container"style="padding-top: 10%;margin-bottom:5%;">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading h2">Tu Perfil</div>
                <div class="panel-body">
                    <form class="form-horizontal" method="POST" action="{{ route('register') }}">
                        {{ csrf_field() }}


                        <div class="form-group{{ $errors->has('profile_picture_file_location') ? ' has-error' : '' }}">
                          <label class="col-md-12" for="profile_picture_file_location">
                            <img src="http://api.randomuser.me/portraits/men/49.jpg"  class="center-block img-circle" alt="">
                          </label>
                            <label for="profile_picture_file_location" class="col-md-4 control-label">Foto de Perfil</label>

                            <div class="col-md-6">
                                <input id="profile_picture_file_location" type="file" class="form-control" name="profile_picture_file_location" value="{{$usuario->profile_picture_file_location }}" required autofocus>

                                @if ($errors->has('profile_picture_file_location'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('profile_picture_file_location') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                            <label for="name" class="col-md-4 control-label">Nombre</label>

                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control" name="name" value="{{$usuario->name}}" required autofocus>

                                @if ($errors->has('name'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('name') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('surname') ? ' has-error' : '' }}">
                            <label for="surname" class="col-md-4 control-label">Apellido</label>

                            <div class="col-md-6">
                                <input id="surname" type="text" class="form-control" name="surname" value="{{ $usuario->surname }}" required autofocus>

                                @if ($errors->has('surname'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('surname') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('username') ? ' has-error' : '' }}">
                            <label for="username" class="col-md-4 control-label">Nombre de Usuario</label>

                            <div class="col-md-6">
                                <input id="username" type="text" class="form-control" name="username" value="{{$usuario->username }}" required autofocus>

                                @if ($errors->has('username'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('username') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                            <label for="email" class="col-md-4 control-label">E-Mail</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control" name="email" value="{{ $usuario->email }}" required>

                                @if ($errors->has('email'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('date_of_birth') ? ' has-error' : '' }}">
                            <label for="username" class="col-md-4 control-label">Date of Birth</label>

                            <div class="col-md-6">
                                <input id="date_of_birth" type="date" class="form-control" name="date" value="{{$usuario->date_of_birth }}" required autofocus>

                                @if ($errors->has('date_of_birth'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('date_of_birth') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('phone') ? ' has-error' : '' }}">
                            <label for="phone" class="col-md-4 control-label">Phone</label>

                            <div class="col-md-6">
                                <input id="phone" type="text" class="form-control" name="phone" value="{{$usuario->phone }}" required autofocus>

                                @if ($errors->has('phone'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('phone') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('git') ? ' has-error' : '' }}">
                            <label for="git" class="col-md-4 control-label">Git</label>

                            <div class="col-md-6">
                                <input id="git" type="text" class="form-control" name="git" value="{{$usuario->git }}" required autofocus>

                                @if ($errors->has('git'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('git') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('linkedin') ? ' has-error' : '' }}">
                            <label for="linkedin" class="col-md-4 control-label">LinkedIn</label>

                            <div class="col-md-6">
                                <input id="linkedin" type="text" class="form-control" name="linkedin" value="{{$usuario->linkedin }}" required autofocus>

                                @if ($errors->has('linkedin'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('linkedin') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('descripcion') ? ' has-error' : '' }}">
                            <label for="descripcion" class="col-md-4 control-label">Descripcion</label>

                            <div class="col-md-6">
                                <textarea id="descripcion" type="text" class="form-control" name="descripcion"   value="{{$usuario->descripcion }}" cols="40" rows="5" required autofocus >
                                </textarea>

                                @if ($errors->has('descripcion'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('descripcion') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('curriculum_file_location') ? ' has-error' : '' }}">
                            <label for="curriculum_file_location" class="col-md-4 control-label">Curriculum</label>

                            <div class="col-md-6">
                                <input id="curriculum_file_location" type="file" class="form-control" name="curriculum_file_location" value="{{$usuario->curriculum_file_location }}" required autofocus>

                                @if ($errors->has('curriculum_file_location'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('curriculum_file_location') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="profile_picture_file_location" class="col-md-4 control-label">Disponible</label>

                            <div class="col-md-6">
                                @if($usuario->available == "Y")
                                <input type="checkbox" name="available" value="Y" checked>
                                @else
                                <input type="checkbox" name="available" value="Y">
                                @endif
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="profile_picture_file_location" class="col-md-4 control-label">Nacionalidad</label>


                        </div>

                        <script type="text/javascript">
                          function getCountries() {
                            var xmlhttp = new XMLHttpRequest();
                            xmlhttp.onreadystatechange = function() {
                              if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
                                console.log(xmlhttp.responseText);
                                //Mi código
                              }
                            };

                            xmlhttp.open("GET", "http://country.io/names.json", true);

                            xmlhttp.send();
                          }

                          getCountries();

                        </script>

                        <div class="form-group">
                            <div class="col-md-6 col-md-offset-4">
                                <button type="submit" class="btn btn-primary">
                                    Editar
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
