@extends("layouts.logedLayout")

@section('title')
Creá tu proyecto - NW
@endsection

@section("contenidoLog")

  <div class="container"style="padding-top: 10%;margin-bottom:5%;">
      <div class="row">
          <div class="col-md-8 col-md-offset-2">
              <div class="panel panel-default">
                  <div class="panel-heading">Crear Proyecto</div>
                  <div class="panel-body">
                    @if ($errors->any())
                      <div class="alert alert-danger">
                          <ul>
                              @foreach ($errors->all() as $error)
                                  <li>{{ $error }}</li>
                              @endforeach
                          </ul>
                      </div>
                    @endif
                    <form class="form-horizontal" method="POST" action="{{ route('crearproyecto') }}">
                      {{ csrf_field() }}

                      <div id="titleDiv" class="form-group">
                          <label for="title" class="col-md-4 control-label">Titulo</label>

                          <div class="col-md-6">
                              <input id="title" type="text" class="form-control" name="title" required>
                          </div>
                      </div>

                      <div id="short-descriptionDiv" class="form-group">
                          <label for="short_description" class="col-md-4 control-label">Presentacion</label>

                          <div class="col-md-6">
                            <textarea id="short-description" name="short_description" cols="40" rows="5" class="form-control" required ></textarea>
                          </div>
                      </div>

                      <div id="long-descriptionDiv" class="form-group">
                          <label for="long_description" class="col-md-4 control-label">Descripcion completa</label>

                          <div class="col-md-6">
                            <textarea id="long-description" name="long_description" cols="40" rows="10" class="form-control" required ></textarea>
                          </div>
                      </div>

                      <div class="form-group">
                        <label for="active" class="col-md-4 control-label">Activo</label>

                        <div class="col-md-6" id="active" >
                          <input type="checkbox" class="form-check-input" name="active" value="Y">
                        </div>
                      </div>

                      <div class="form-group">
                        <label class="col-md-4 control-label">Especialidades en las que estas interesado</label>
                        <span class="col-md-6"></span>
                        <button type="button" id="addSkill" class="btn btn-info" >+</button>
                        <div class="col-md-12" id='skillsSelectors'>
                          <select class="hidden" id='genericSkillSelector'>
                            <option value=NULL>Seleccioná una habilidad</option>
                            @foreach ($skills as $skill)
                              <option value="{{$skill->id}}">{{$skill->name}}</option>
                            @endforeach
                          </select>
                          <select class="hidden" id='genericSenioritySelector'>
                            @php
                              $seniorities = [NULL => 'Cualquier nivel de expertise',
                                              'trainee' => 'Trainee',
                                              'junior' => 'Junior',
                                              'semi_senior' => 'Semi-senior',
                                              'senior' => 'Senior'];
                            @endphp
                            @foreach ($seniorities as $seniority_level => $nivel)
                              <option value="{{$seniority_level}}">{{$nivel}}</option>
                            @endforeach
                          </select>
                          <button type="button" class="hidden" id='genericRemoveSkillSelector' >-</button>
                        </div>
                      </div>

                      <input type="hidden" id='genericSelectorIdentifier'>

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

                      <div class="form-group">
                        <div class="col-md-8 col-md-offset-4">
                          <button type="submit" class="btn btn-primary">
                            Crear
                          </button>
                        </div>
                      </div>

                      <script type="text/javascript">

                        var title            = document.querySelector("#title");
                        var shortDescription = document.querySelector("#short-description");
                        var longDescription  = document.querySelector("#long-description");

                        var titleDiv            = document.querySelector("#titleDiv");
                        var shortDescriptionDiv = document.querySelector("#short-descriptionDiv");
                        var longDescriptionDiv  = document.querySelector("#long-descriptionDiv");

                        title.addEventListener("blur", function() {
                          if (this.value == "") {
                            if (!titleDiv.children[1].children[1]) {
                              var span = document.createElement("span");
                              span.setAttribute('class', 'help-block');
                              span.innerHTML = "<strong> Por favor, ingresá un título </strong>";
                              titleDiv.children[1].appendChild(span);
                            }
                            titleDiv.setAttribute('class', 'form-group has-error');
                          } else {
                            if (titleDiv.children[1].children[1]) {
                              titleDiv.children[1].removeChild(titleDiv.children[1].children[1]);
                            }
                            if (titleDiv.children[1].children[1]) {
                              titleDiv.removeChild(titleDiv.children[1].children[1]);
                            }
                            titleDiv.setAttribute('class', 'form-group has-success');
                          }
                        });

                        shortDescription.addEventListener("blur", function() {
                          if (this.value == "") {
                            if (!shortDescriptionDiv.children[1].children[1]) {
                              var span = document.createElement("span");
                              span.setAttribute('class', 'help-block');
                              span.innerHTML = "<strong> Por favor, ingresa una corta descripción de tu proyecto </strong>";
                              shortDescriptionDiv.children[1].appendChild(span);
                            }
                            shortDescriptionDiv.setAttribute('class', 'form-group has-error');
                          } else {
                            if (shortDescriptionDiv.children[1].children[1]) {
                              shortDescriptionDiv.children[1].removeChild(shortDescriptionDiv.children[1].children[1]);
                            }
                            if (shortDescriptionDiv.children[1].children[1]) {
                              shortDescriptionDiv.removeChild(shortDescriptionDiv.children[1].children[1]);
                            }
                            shortDescriptionDiv.setAttribute('class', 'form-group has-success');
                          }
                        });

                        longDescription.addEventListener("blur", function() {
                          if (this.value == "") {
                            if (!longDescriptionDiv.children[1].children[1]) {
                              var span = document.createElement("span");
                              span.setAttribute('class', 'help-block');
                              span.innerHTML = "<strong> Por favor, describe tu proyecto en detalle </strong>";
                              longDescriptionDiv.children[1].appendChild(span);
                            }
                            longDescriptionDiv.setAttribute('class', 'form-group has-error');
                          } else {
                            if (longDescriptionDiv.children[1].children[1]) {
                              longDescriptionDiv.children[1].removeChild(longDescriptionDiv.children[1].children[1]);
                            }
                            if (longDescriptionDiv.children[1].children[1]) {
                              longDescriptionDiv.removeChild(longDescriptionDiv.children[1].children[1]);
                            }
                            longDescriptionDiv.setAttribute('class', 'form-group has-success');
                          }
                        });

                      </script>
                    </form>
                  </div>
              </div>
          </div>
      </div>
  </div>
@endsection
