@extends('layouts.welcomeLayout')
@section('contenido')
<div class="container"style="padding-top: 10%;margin-bottom:5%;">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Entrá</div>
                <div class="panel-body">
                    <form class="form-horizontal" method="POST" action="{{ route('login') }}">
                        {{ csrf_field() }}
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
                        <div class="form-group">
                            <div class="col-md-6 col-md-offset-4">
                                <div class="checkbox">
                                    <label>
                                        <input type="checkbox" name="remember" {{ old('remember') ? 'checked' : '' }}> Recordame
                                    </label>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-md-8 col-md-offset-4">
                                <button type="submit" class="btn btn-primary">
                                    Entrá
                                </button>
                                <a class="btn btn-link" href="{{ route('password.request') }}">
                                    ¿Olvidaste tu contraseña?
                                </a>
                            </div>
                        </div>
                        <script type="text/javascript">

                          window.addEventListener("load", function() {
                            var email    = document.querySelector("#email");
                            var password = document.querySelector("#password");

                            var emailDiv    = document.querySelector("#emailDiv");
                            var passwordDiv = document.querySelector("#passwordDiv");

                            email.addEventListener("blur", function() {
                              if (this.value == "") {
                                if (!emailDiv.children[1].children[1]) {
                                  var span = document.createElement("span");
                                  span.setAttribute('class', 'help-block');
                                  span.innerHTML = "<strong> Por favor, ingresá tu e-mail </strong>";
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
                                  span.innerHTML = "<strong> Por favor, ingresá tu contraseña </strong>";
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
                          });
                        </script>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
