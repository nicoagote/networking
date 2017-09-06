@extends('layouts.logedLayout')

@section('title')
Home
@endsection
@section('css')
  .input-group{
    margin-top:100px;
  }
@endsection
@section('link')
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
@endsection
@section('contenidoLog')
<!--Search bar-->
<div class="container">
    <div class="row">
        <div class="col-xs-8 col-xs-offset-2">
		    <div class="input-group">
                <div class="input-group-btn search-panel">
                    <button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown">
                    	<span id="search_concept">Filter by</span> <span class="caret"></span>
                    </button>
                    <ul class="dropdown-menu" role="menu">
                      <li><a href="#contains">Proyectos</a></li>
                      <li class="divider"></li>
                      <li><a href="#its_equal">Personas</a></li>
                    </ul>
                </div>
                <input type="hidden" name="search_param" value="all" id="search_param">
                <input type="text" class="form-control" name="x" placeholder="Search term...">
                <span class="input-group-btn">
                    <button class="btn btn-default" type="button"><span class="glyphicon glyphicon-search"></span></button>
                </span>
            </div>
        </div>
	</div>
</div>
<div class="row">
  <div class="col-xs-8 col-xs-offset-2">
    <button id="botonBusquedaAvanzada" style="float: right;border: none;background-color: white;">
      Busqueda Avanzada
    </button>
  </div>
</div>
<div id="opcionesBusquedaAvanzada" style="display:none">
  <div class="form-group">
    <ul class="nav">
      <li class="nav-item">
        <div class="dropdown">
        <button class="btn btn-primary dropdown-toggle" type="button" data-toggle="dropdown">Ordenar Por
        <span class="caret"></span></button>
        <ul class="dropdown-menu">
          <li><a href="#">Asendiente</a></li>
          <li><a href="#">desendiente</a></li>
        </ul>
      </div>
    </li>
    <li class="nav-item">
      <button type="button" id="addSkill" class="btn btn-info" >Buscar por Skills</button>
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
                            'semi-senior' => 'Semi-senior',
                            'senior' => 'Senior'];
          @endphp
          @foreach ($seniorities as $seniority_level => $nivel)
            <option value="{{$seniority_level}}">{{$nivel}}</option>
          @endforeach
        </select>
        <button type="button" class="hidden" id='genericRemoveSkillSelector' >-</button>
      </div>
    </div>

    </li>
    </ul>
  {{-- <label class="col-md-4 control-label">Especialidades en las que estas interesado</label> --}}
  {{-- <span class="col-md-6"></span> --}}


<input type="hidden" id='genericSelectorIdentifier'>

</div>

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



<script
src="https://code.jquery.com/jquery-3.2.1.min.js"
integrity="sha256-hwg4gsxgFZhOsEEamdOYGBf13FyQuiTwlAQgxVSNgt4="
crossorigin="anonymous">
</script>


<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js">
</script>
<script type="text/javascript">
  $(document).ready(function(e){
    $('.search-panel .dropdown-menu').find('a').click(function(e) {
		e.preventDefault();
		var param = $(this).attr("href").replace("#","");
		var concept = $(this).text();
		$('.search-panel span#search_concept').text(concept);
		$('.input-group #search_param').val(param);
	});
});

var botonBusquedaAvanzada = document.getElementById('botonBusquedaAvanzada');
var opcionesBusquedaAvanzada = document.getElementById('opcionesBusquedaAvanzada');
botonBusquedaAvanzada.onclick = function () {
  if (opcionesBusquedaAvanzada.style.display=='none') {
    opcionesBusquedaAvanzada.style.display='block';
  }else {
    opcionesBusquedaAvanzada.style.display='none';
  }
}
</script>
<!--Search bar-->
@endsection
