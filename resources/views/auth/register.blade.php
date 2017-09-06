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
                                if (!nameDiv.children[1].children[1]) {
                                  var span = document.createElement("span");
                                  span.setAttribute('class', 'help-block');
                                  span.innerHTML = "<strong> Por favor, ingresá un nombre </strong>";
                                  nameDiv.children[1].appendChild(span);
                                }
                                nameDiv.setAttribute('class', 'form-group has-error');
                              } else {
                                if (nameDiv.children[1].children[1]) {
                                  nameDiv.children[1].removeChild(nameDiv.children[1].children[1]);
                                }
                                if (nameDiv.children[1].children[1]) {
                                  nameDiv.removeChild(nameDiv.children[1].children[1]);
                                }
                                nameDiv.setAttribute('class', 'form-group has-success');
                              }
                            });

                            surname.addEventListener("blur", function() {
                              if (this.value == "") {
                                if (!surnameDiv.children[1].children[1]) {
                                  var span = document.createElement("span");
                                  span.setAttribute('class', 'help-block');
                                  span.innerHTML = "<strong> Por favor, ingresá un apellido </strong>";
                                  surnameDiv.children[1].appendChild(span);
                                }
                                surnameDiv.setAttribute('class', 'form-group has-error');
                              } else {
                                if (surnameDiv.children[1].children[1]) {
                                  surnameDiv.children[1].removeChild(surnameDiv.children[1].children[1]);
                                }
                                if (surnameDiv.children[1].children[1]) {
                                  surnameDiv.removeChild(surnameDiv.children[1].children[1]);
                                }
                                surnameDiv.setAttribute('class', 'form-group has-success');
                              }
                            });

                            username.addEventListener("blur", function() {
                              if (this.value == "") {
                                if (!usernameDiv.children[1].children[1]) {
                                  var span = document.createElement("span");
                                  span.setAttribute('class', 'help-block');
                                  span.innerHTML = "<strong> Por favor, ingresá un nombre de usuario </strong>";
                                  usernameDiv.children[1].appendChild(span);
                                }
                                usernameDiv.setAttribute('class', 'form-group has-error');
                              } else {
                                if (usernameDiv.children[1].children[1]) {
                                  usernameDiv.children[1].removeChild(usernameDiv.children[1].children[1]);
                                }
                                if (usernameDiv.children[1].children[1]) {
                                  usernameDiv.removeChild(usernameDiv.children[1].children[1]);
                                }
                                usernameDiv.setAttribute('class', 'form-group has-success');
                              }
                            });

                            email.addEventListener("blur", function() {
                              if (this.value == "") {
                                if (!emailDiv.children[1].children[1]) {
                                  var span = document.createElement("span");
                                  span.setAttribute('class', 'help-block');
                                  span.innerHTML = "<strong> Por favor, ingresá un e-mail </strong>";
                                  emailDiv.children[1].appendChild(span);
                                }
                                emailDiv.setAttribute('class', 'form-group has-error');
                              } else {
                                if (emailDiv.children[1].children[1]) {
                                  emailDiv.children[1].removeChild(emailDiv.children[1].children[1]);
                                }
                                if (emailDiv.children[1].children[1]) {
                                  emailDiv.removeChild(emailDiv.children[1].children[1]);
                                }
                                emailDiv.setAttribute('class', 'form-group has-success');
                              }
                            });

                            password.addEventListener("blur", function() {
                              if (this.value == "") {
                                if (!passwordDiv.children[1].children[1]) {
                                  var span = document.createElement("span");
                                  span.setAttribute('class', 'help-block');
                                  span.innerHTML = "<strong> Por favor, ingresá una contraseña </strong>";
                                  passwordDiv.children[1].appendChild(span);
                                }
                                passwordDiv.setAttribute('class', 'form-group has-error');
                              } else {
                                if (passwordDiv.children[1].children[1]) {
                                  passwordDiv.children[1].removeChild(passwordDiv.children[1].children[1]);
                                }
                                if (passwordDiv.children[1].children[1]) {
                                  passwordDiv.removeChild(passwordDiv.children[1].children[1]);
                                }
                                passwordDiv.setAttribute('class', 'form-group has-success');
                              }
                            });

                            passwordConfirm.addEventListener("blur", function() {
                              if (this.value == "") {
                                if (!passwordConfirmDiv.children[1].children[1]) {
                                  var span = document.createElement("span");
                                  span.setAttribute('class', 'help-block');
                                  span.innerHTML = "<strong> Por favor, confirma tu contraseña </strong>";
                                  passwordConfirmDiv.children[1].appendChild(span);
                                }
                                passwordConfirmDiv.setAttribute('class', 'form-group has-error');
                              } else {
                                if (passwordConfirmDiv.children[1].children[1]) {
                                  passwordConfirmDiv.children[1].removeChild(passwordConfirmDiv.children[1].children[1]);
                                }
                                if (passwordConfirmDiv.children[1].children[1]) {
                                  passwordConfirmDiv.removeChild(passwordConfirmDiv.children[1].children[1]);
                                }
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
