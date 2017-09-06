@extends('layouts.welcomeLayout')

@section('contenido')
<div class="container"style="padding-top: 10%;margin-bottom:5%;">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Registrate</div>
                <div class="panel-body">
                    <form class="form-horizontal" method="POST" action="{{ route('register') }}">
                        {{ csrf_field() }}

                        <div id="nameDiv" class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                            <label for="name" class="col-md-4 control-label">Nombre</label>

                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control form-has-error" name="name" value="{{ old('name') }}" required autofocus>

                                @if ($errors->has('name'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('name') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div id="surnameDiv" class="form-group{{ $errors->has('surname') ? ' has-error' : '' }}">
                            <label for="surname" class="col-md-4 control-label">Apellido</label>

                            <div class="col-md-6">
                                <input id="surname" type="text" class="form-control" name="surname" value="{{ old('surname') }}" required autofocus>

                                @if ($errors->has('surname'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('surname') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div id="usernameDiv" class="form-group{{ $errors->has('username') ? ' has-error' : '' }}">
                            <label for="username" class="col-md-4 control-label">Nombre de Usuario</label>

                            <div class="col-md-6">
                                <input id="username" type="text" class="form-control" name="username" value="{{ old('username') }}" required autofocus>

                                @if ($errors->has('username'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('username') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div id="emailDiv" class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                            <label for="email" class="col-md-4 control-label">E-Mail</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}" required>

                                @if ($errors->has('email'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div id="passwordDiv" class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                            <label for="password" class="col-md-4 control-label">Contraseña</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control" name="password" required>

                                @if ($errors->has('password'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div id="password-confirmDiv" class="form-group">
                            <label for="password-confirm" class="col-md-4 control-label">Confirmar Contraseña</label>

                            <div class="col-md-6">
                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required>
                            </div>
                        </div>

                        <div id="sexDiv" class="form-group{{ $errors->has('sex') ? ' has-error' : '' }}">
                            <label for="sex" class="col-md-4 control-label">Género</label>

                            <div class="container col-md-8">
                              <label for="masculino" class="col-md-3 radio-inline">
                                <input id="masculino" type="radio" name="sex" value="1">
                              Masculino</label>
                              <label for="femenino" class="col-md-3 radio-inline">
                                <input id="femenino" type="radio" name="sex" value="0">
                              Femenino</label>

                                @if ($errors->has('sex'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('sex') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-md-6 col-md-offset-4">
                                <button type="submit" class="btn btn-primary">
                                    Registrate
                                </button>
                            </div>
                        </div>
                        <script type="text/javascript">

                          window.addEventListener("load", function() {
                            var name               = document.querySelector("#name");
                            var surname            = document.querySelector("#surname");
                            var username           = document.querySelector("#username");
                            var email              = document.querySelector("#email");
                            var password           = document.querySelector("#password");
                            var passwordConfirm    = document.querySelector("#password-confirm");

                            var nameDiv             = document.querySelector("#nameDiv");
                            var surnameDiv          = document.querySelector("#surnameDiv");
                            var usernameDiv         = document.querySelector("#usernameDiv");
                            var emailDiv            = document.querySelector("#emailDiv");
                            var passwordDiv         = document.querySelector("#passwordDiv");
                            var passwordConfirmDiv  = document.querySelector("#password-confirmDiv");


                            name.addEventListener("blur", function() {
                              if (this.value == "") {
                                nameDiv.setAttribute('class', 'form-group has-error');
                              } else {
                                nameDiv.setAttribute('class', 'form-group has-success');
                              }
                            });

                            surname.addEventListener("blur", function() {
                              if (this.value == "") {
                                surnameDiv.setAttribute('class', 'form-group has-error');
                              } else {
                                surnameDiv.setAttribute('class', 'form-group has-success');
                              }
                            });

                            username.addEventListener("blur", function() {
                              if (this.value == "") {
                                usernameDiv.setAttribute('class', 'form-group has-error');
                              } else {
                                usernameDiv.setAttribute('class', 'form-group has-success');
                              }
                            });

                            email.addEventListener("blur", function() {
                              if (this.value == "") {
                                emailDiv.setAttribute('class', 'form-group has-error');
                              } else {
                                emailDiv.setAttribute('class', 'form-group has-success');
                              }
                            });

                            console.log(passwordDiv);

                            password.addEventListener("blur", function() {
                              if (this.value == "") {
                                passwordDiv.setAttribute('class', 'form-group has-error');
                              } else {
                                passwordDiv.setAttribute('class', 'form-group has-success');
                              }
                            });

                            passwordConfirm.addEventListener("blur", function() {
                              if (this.value == "") {
                                passwordConfirmDiv.setAttribute('class', 'form-group has-error');
                              } else {
                                passwordConfirmDiv.setAttribute('class', 'form-group has-success');
                              }
                            });

                          });
                        </script>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
