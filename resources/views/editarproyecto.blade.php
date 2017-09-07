@extends("layouts.logedLayout")

@section('title')
Edita tu proyecto - NW
@endsection

@section("contenidoLog")

  <div class="container"style="padding-top: 5%;margin-bottom:5%;">
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
                    <form class="form-horizontal" method="POST" action="/editarproyecto/guardar">
                      {{ csrf_field() }}

                      <input type="hidden" name="project_id" value="{{$proyecto->id}}">

                      <div class="form-group">
                          <label for="title" class="col-md-4 control-label">Titulo</label>

                          <div class="col-md-6">
                              <input type="text" class="form-control" name="title" value="{{$proyecto->title}}" required>
                          </div>
                      </div>

                      <div class="form-group">
                          <label for="short_description" class="col-md-4 control-label">Presentacion</label>

                          <div class="col-md-6">
                            <textarea name="short_description" cols="40" rows="5" class="form-control" required autofocus >{{$proyecto->short_description}}</textarea>
                          </div>
                      </div>

                      <div class="form-group">
                          <label for="long_description" class="col-md-4 control-label">Descripcion completa</label>

                          <div class="col-md-6">
                            <textarea name="long_description" cols="40" rows="10" class="form-control" required autofocus >{{$proyecto->long_description}}</textarea>
                          </div>
                      </div>

                      <div class="form-group">
                        <label for="active" class="col-md-4 control-label">Activo</label>
                        <div class="col-md-6" id="active" >
                        <?php if ($proyecto->active == 'Y'): ?>
                          <input type="checkbox" class="form-check-input" name="active" value="Y" checked>
                        <?php else: ?>
                          <input type="checkbox" class="form-check-input" name="active" value="Y">
                        <?php endif; ?>
                      </div>
                      </div>

                      <div class="form-group">
                        <label class="col-md-4 control-label">Especialidades en las que estas interesado</label>
                        <span class="col-md-6"></span>
                        <button type="button" id="addSkill" class="btn btn-info" >+</button>
                        <div class="col-md-12" id='skillsSelectors'>
                          <input type="hidden" id='genericSelectorIdentifier'>
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
                          <script>
                          var skillsSelectorsDiv = document.getElementById('skillsSelectors');
                          var addSkillButton = document.getElementById('addSkill');
                          addSkillButton.counter = 0;

                          var genericSelectorIdentifier = document.getElementById('genericSelectorIdentifier');

                          var genericSkillSelector = document.getElementById('genericSkillSelector');
                          var genericSenioritySelector = document.getElementById('genericSenioritySelector');
                          var genericRemoveSkillSelector = document.getElementById('genericRemoveSkillSelector');

                          addSkillButton.onclick = function() {addSkillSelector();};

                          function addSkillSelector() {
                            if (validarSkillSelectors()) {
                              if(isNaN(addSkillButton.counter)) {
                                addSkillButton.counter = 0;
                              }
                              var newSkillsSelector = document.createElement('div');
                              newSkillsSelector.setAttribute('class', 'col-md-12');
                              var newGenericSkillSelector = genericSkillSelector.cloneNode(true);
                              var newGenericSenioritySelector = genericSenioritySelector.cloneNode(true);
                              var newGenericRemoveSkillSelector = genericRemoveSkillSelector.cloneNode(true);
                              var newGenericSelectorIdentifier = genericSelectorIdentifier.cloneNode(true);
                              console.log(addSkillButton.counter);
                              newGenericSkillSelector.removeAttribute('id');
                              newGenericSenioritySelector.removeAttribute('id');
                              newGenericRemoveSkillSelector.removeAttribute('id');

                              newGenericSkillSelector.removeAttribute('class', 'hidden');
                              newGenericSenioritySelector.removeAttribute('class', 'hidden');
                              newGenericRemoveSkillSelector.removeAttribute('class', 'hidden');

                              newGenericSkillSelector.setAttribute('name', 'skill' + addSkillButton.counter);
                              newGenericSenioritySelector.setAttribute('name', 'seniority_level' + addSkillButton.counter);
                              newGenericRemoveSkillSelector.setAttribute('name', 'removeSkillSelector' + addSkillButton.counter);

                              newGenericSkillSelector.setAttribute('class', 'form-control');
                              newGenericSenioritySelector.setAttribute('class', 'form-control');
                              newGenericRemoveSkillSelector.setAttribute('class', 'btn btn-secondary')

                              newGenericSkillSelector.setAttribute('style', 'width:45%;margin:0;display:inline-block;');
                              newGenericSenioritySelector.setAttribute('style', 'width:45%;margin:0;display:inline-block;');

                              newGenericSkillSelector.setAttribute('id', 'skill' + addSkillButton.counter);
                              newGenericSenioritySelector.setAttribute('id', 'seniority_level' + addSkillButton.counter);
                              newSkillsSelector.setAttribute('id', 'skillSelectorDiv' + addSkillButton.counter);

                              newGenericRemoveSkillSelector.onclick =  function() {
                                var parentDiv = this.parentNode;
                                skillsSelectorsDiv.removeChild(parentDiv);
                              }

                              newGenericSelectorIdentifier.setAttribute('name', 'skillSelector[]');
                              newGenericSelectorIdentifier.setAttribute('type', 'hidden');
                              newGenericSelectorIdentifier.setAttribute('value', addSkillButton.counter);

                              newSkillsSelector.appendChild(newGenericSkillSelector);
                              newSkillsSelector.appendChild(newGenericSenioritySelector);
                              newSkillsSelector.appendChild(newGenericRemoveSkillSelector);
                              newSkillsSelector.appendChild(newGenericSelectorIdentifier);

                              console.log(newSkillsSelector, addSkillButton.counter);

                              skillsSelectorsDiv.appendChild(newSkillsSelector);

                              addSkillButton.counter = addSkillButton.counter+1;
                            }
                            console.log(addSkillButton.counter);
                          }

                          function validarSkillSelectors() {
                            for (var i = 0; i < addSkillButton.counter + 1; i++) {
                              var queryId = 'skill' + i;
                              var skillSelector = document.getElementById(queryId);
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
                        @foreach ($projectSkills as $projectSkill)
                        <script>
                          var query;
                          addSkillSelector();
                          query = 'skillSelectorDiv' + (addSkillButton.counter - 1);
                          console.log(query);
                          var currentSkillSelectorDiv = document.getElementById(query);
                          var currentSkillSelector = currentSkillSelectorDiv.children[0];
                          var currentSenioritySelector =  currentSkillSelectorDiv.children[1];

                          currentSkillSelector.children[{{$projectSkill->skill_id}}].selected = true;
                          var key;
                          var seniority_level = '<?=$projectSkill->seniority_level?>';
                          if (seniority_level == 'trainee') {
                            key = 1;
                          } else if (seniority_level == 'junior') {
                            key = 2;
                          } else if (seniority_level == 'semi_senior') {
                            key = 3;
                          } else if (seniority_level == 'senior') {
                            key = 4;
                          } else {
                            key = 0;
                          }

                          currentSenioritySelector.children[key].selected = true;

                        </script>
                        @endforeach
                        </div>
                      </div>



                      <div class="form-group">
                        <div class="col-md-8 col-md-offset-4">
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
