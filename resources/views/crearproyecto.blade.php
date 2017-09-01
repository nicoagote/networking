@extends("layouts.logedLayout")

@section("contenidoLog")

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
                              <label for="short_description" class="col-md-4 control-label">Presentacion</label>

                              <div class="col-md-6">
                                <textarea name="short_description" cols="40" rows="5" class="form-control" required autofocus ></textarea>
                              </div>
                          </div>

                          <div class="form-group">
                              <label for="long_description" class="col-md-4 control-label">Descripcion completa</label>

                              <div class="col-md-6">
                                <textarea name="long_description" cols="40" rows="10" class="form-control" required autofocus ></textarea>
                              </div>
                          </div>

                          <!-- <div class="form-group">
                              <label for="active" class="col-md-4 control-label">Activo</label>

                              <div id="active" class="col-md-6">
                                <input type="checkbox" name="active" value="">
                              </div>
                          </div> -->

                          <div class="form-group">
                            <label for="active" class="col-md-4 control-label">Activo</label>

                            <div class="col-md-6" id="active" >
                              <input type="checkbox" name="active" value="Y">
                            </div>
                          </div>

                          <div class="form-group">
                            <label class="col-md-4 control-label">Especialidades en las que estas interesado</label>
                            <button type="button" id="addSkill" class="btn btn-info" >+</button>
                            <div class="" id='skillsSelectors'>
                              <select class="col-md-3 hidden" id='genericSkillSelector'>
                                @foreach ($skills as $skill)
                                  <option value="{{$skill->id}}">{{$skill->name}}</option>
                                @endforeach
                              </select>
                              <select class="col-md-3 hidden" id='genericSenioritySelector'>
                                @php
                                  $seniorities = [NULL => 'Selecciona un nivel de expertise',
                                                  'trainee' => 'Trainee',
                                                  'junior' => 'Junior',
                                                  'semi-senior' => 'Semi-senior',
                                                  'senior' => 'Senior'];
                                @endphp
                                @foreach ($seniorities as $seniority_level => $nivel)
                                  <option value="{{$seniority_level}}">{{$nivel}}</option>
                                @endforeach
                              </select>
                              <button type="button" class="hidden" id='genericRemoveSkillSelector' class="btn btn-default">-</button>
                            </div>
                          </div>

                          <script>
                            var skillsSelectorsDiv = document.getElementById('skillsSelectors');
                            var addSkillButton = document.getElementById('addSkill');
                            addSkillButton.counter = 0;

                            var genericSkillSelector = document.getElementById('genericSkillSelector');
                            var genericSenioritySelector = document.getElementById('genericSenioritySelector');
                            var genericRemoveSkillSelector = document.getElementById('genericRemoveSkillSelector');

                            addSkillButton.onclick = function() {
                              console.log('Estoy aca!');
                                console.log(addSkillButton.counter);
                                var newSkillsSelector = document.createElement('div');
                                var newGenericSkillSelector = genericSkillSelector.cloneNode(true);
                                var newGenericSenioritySelector = genericSenioritySelector.cloneNode(true);
                                var newGenericRemoveSkillSelector = genericRemoveSkillSelector.cloneNode(true);

                                newGenericSkillSelector.removeAttribute('id');
                                newGenericSenioritySelector.removeAttribute('id');
                                newGenericRemoveSkillSelector.removeAttribute('id');

                                newGenericSkillSelector.removeAttribute('class', 'hidden');
                                newGenericSenioritySelector.removeAttribute('class', 'hidden');
                                newGenericRemoveSkillSelector.removeAttribute('class', 'hidden');

                                newGenericSkillSelector.setAttribute('name', 'skill' + this.counter);
                                newGenericSenioritySelector.setAttribute('name', 'seniority_level' + this.counter);
                                newGenericRemoveSkillSelector.setAttribute('name', 'removeSkillSelector' + this.counter);

                                newGenericRemoveSkillSelector.onclick =  function() {
                                  var parentDiv = this.parentNode;
                                  console.log(parentDiv);
                                  skillsSelectorsDiv.removeChild(parentDiv);
                                }

                                newSkillsSelector.appendChild(newGenericSkillSelector);
                                newSkillsSelector.appendChild(newGenericSenioritySelector);
                                newSkillsSelector.appendChild(newGenericRemoveSkillSelector);

                                console.log(newSkillsSelector, this.counter);

                                skillsSelectorsDiv.appendChild(newSkillsSelector);

                                addSkillButton.counter = addSkillButton.counter + 1;
                            }

                          </script>

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
