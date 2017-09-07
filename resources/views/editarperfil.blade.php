@extends('layouts.logedLayout')

@section("title")
 Editar perfil
@endsection

@section("contenidoLog")

<div class="container"style="padding-top: 5%;margin-bottom:5%;">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading h2">Tu Perfil</div>
                <div class="panel-body">
                    <form class="form-horizontal" method="POST" action="{{ route('editarperfil') }}" enctype="multipart/form-data">
                        {{ csrf_field() }}

                        <div class="form-group{{ $errors->has('profile_picture_file_location') ? ' has-error' : '' }}">
                          <label class="col-md-12" for="profile_picture_file_location" title="Si no elegís ningún archivo no se sobreescribirá">
                            <img src="{{Auth::user()->getProfilePictureLocation()}}"  class="center-block img-circle" alt="">
                          </label>
                            <label for="profile_picture_file_location" class="col-md-4 control-label" title="Si no elegís ningún archivo no se sobreescribirá">Foto de Perfil</label>

                            <div class="col-md-6">
                                <input id="profile_picture_file_location" type="file" class="form-control" name="profile_picture_file_location" value="{{ $user->profile_picture_file_location }}"  autofocus>

                                @if ($errors->has('profile_picture_file_location'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('profile_picture_file_location') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div id="nameDiv" class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                            <label for="name" class="col-md-4 control-label">Nombre</label>

                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control" name="name" value="{{$user->name}}" required autofocus>

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
                                <input id="surname" type="text" class="form-control" name="surname" value="{{ $user->surname }}" required autofocus>

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
                                <input id="username" type="text" class="form-control" name="username" value="{{$user->username }}" required autofocus>

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
                                <input id="email" type="email" class="form-control" name="email" value="{{ $user->email }}" required>

                                @if ($errors->has('email'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('date_of_birth') ? ' has-error' : '' }}">
                            <label for="date_of_birth" class="col-md-4 control-label">Fecha de nacimiento</label>

                            <div class="col-md-6">
                                <input id="date_of_birth" type="date" class="form-control" name="date_of_birth" value="{{$user->date_of_birth }}" autofocus>

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
                                <input id="phone" type="text" class="form-control" name="phone" value="{{$user->phone }}"  autofocus>

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
                                <input id="git" type="text" class="form-control" name="git" value="{{$user->git }}"  autofocus>

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
                                <input id="linkedin" type="text" class="form-control" name="linkedin" value="{{$user->linkedin }}"  autofocus>

                                @if ($errors->has('linkedin'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('linkedin') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('description') ? ' has-error' : '' }}">
                            <label for="description" class="col-md-4 control-label">Descripcion</label>

                            <div class="col-md-6">
                                <textarea id="description" type="text" class="form-control" name="description"   cols="40" rows="5" >{{$user->description }}</textarea>

                                @if ($errors->has('description'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('description') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('curriculum_file_location') ? ' has-error' : '' }}">
                            @if(isset($user->curriculum_file_location))
                            <a class="col-md-8 col-md-offset-4" href="{{$user->curriculumDownloadLink()}}" target="_blank">Tu curriculum actual</a>
                            @endif
                            <label for="curriculum_file_location" class="col-md-4 control-label" title="Si no elegís ningún archivo no se sobreescribirá">Curriculum</label>

                            <div class="col-md-6">
                                <input id="curriculum_file_location" type="file" class="form-control" name="curriculum_file_location" value="{{$user->curriculum_file_location }}"  autofocus>

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
                                @if($user->available == "Y")
                                <input type="checkbox" name="available" value="Y" checked>
                                @else
                                <input type="checkbox" name="available" value="Y">
                                @endif
                            </div>
                        </div>

                        <div class="form-group" >
                            <label for="profile_picture_file_location" class="col-md-4 control-label">País</label>

                            <div class="col-md-6" id='paisDiv'>

                            </div>

                        </div>

                        <script type="text/javascript">
                          // FUNCIONA pero en el servidor

                          function getCountries() {
                            var xmlhttp = new XMLHttpRequest();
                            xmlhttp.onreadystatechange = function() {
                              if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
                                console.log(JSON.parse(xmlhttp.responseText));
                                return JSON.parse(xmlhttp.responseText);
                              }
                            };

                            xmlhttp.open("GET", "http://country.io/names.json", true);

                            xmlhttp.send();
                          }

                          function generateCountriesSelect() {
                            // var countriesJson = getCountries();
                            // var countriesObject = JSON.parse(countriesJson);

                            var countriesObject = {"BD": "Bangladesh", "BE": "Belgium", "BF": "Burkina Faso", "BG": "Bulgaria", "BA": "Bosnia and Herzegovina", "BB": "Barbados", "WF": "Wallis and Futuna", "BL": "Saint Barthelemy", "BM": "Bermuda", "BN": "Brunei", "BO": "Bolivia", "BH": "Bahrain", "BI": "Burundi", "BJ": "Benin", "BT": "Bhutan", "JM": "Jamaica", "BV": "Bouvet Island", "BW": "Botswana", "WS": "Samoa", "BQ": "Bonaire, Saint Eustatius and Saba ", "BR": "Brazil", "BS": "Bahamas", "JE": "Jersey", "BY": "Belarus", "BZ": "Belize", "RU": "Russia", "RW": "Rwanda", "RS": "Serbia", "TL": "East Timor", "RE": "Reunion", "TM": "Turkmenistan", "TJ": "Tajikistan", "RO": "Romania", "TK": "Tokelau", "GW": "Guinea-Bissau", "GU": "Guam", "GT": "Guatemala", "GS": "South Georgia and the South Sandwich Islands", "GR": "Greece", "GQ": "Equatorial Guinea", "GP": "Guadeloupe", "JP": "Japan", "GY": "Guyana", "GG": "Guernsey", "GF": "French Guiana", "GE": "Georgia", "GD": "Grenada", "GB": "United Kingdom", "GA": "Gabon", "SV": "El Salvador", "GN": "Guinea", "GM": "Gambia", "GL": "Greenland", "GI": "Gibraltar", "GH": "Ghana", "OM": "Oman", "TN": "Tunisia", "JO": "Jordan", "HR": "Croatia", "HT": "Haiti", "HU": "Hungary", "HK": "Hong Kong", "HN": "Honduras", "HM": "Heard Island and McDonald Islands", "VE": "Venezuela", "PR": "Puerto Rico", "PS": "Palestinian Territory", "PW": "Palau", "PT": "Portugal", "SJ": "Svalbard and Jan Mayen", "PY": "Paraguay", "IQ": "Iraq", "PA": "Panama", "PF": "French Polynesia", "PG": "Papua New Guinea", "PE": "Peru", "PK": "Pakistan", "PH": "Philippines", "PN": "Pitcairn", "PL": "Poland", "PM": "Saint Pierre and Miquelon", "ZM": "Zambia", "EH": "Western Sahara", "EE": "Estonia", "EG": "Egypt", "ZA": "South Africa", "EC": "Ecuador", "IT": "Italy", "VN": "Vietnam", "SB": "Solomon Islands", "ET": "Ethiopia", "SO": "Somalia", "ZW": "Zimbabwe", "SA": "Saudi Arabia", "ES": "Spain", "ER": "Eritrea", "ME": "Montenegro", "MD": "Moldova", "MG": "Madagascar", "MF": "Saint Martin", "MA": "Morocco", "MC": "Monaco", "UZ": "Uzbekistan", "MM": "Myanmar", "ML": "Mali", "MO": "Macao", "MN": "Mongolia", "MH": "Marshall Islands", "MK": "Macedonia", "MU": "Mauritius", "MT": "Malta", "MW": "Malawi", "MV": "Maldives", "MQ": "Martinique", "MP": "Northern Mariana Islands", "MS": "Montserrat", "MR": "Mauritania", "IM": "Isle of Man", "UG": "Uganda", "TZ": "Tanzania", "MY": "Malaysia", "MX": "Mexico", "IL": "Israel", "FR": "France", "IO": "British Indian Ocean Territory", "SH": "Saint Helena", "FI": "Finland", "FJ": "Fiji", "FK": "Falkland Islands", "FM": "Micronesia", "FO": "Faroe Islands", "NI": "Nicaragua", "NL": "Netherlands", "NO": "Norway", "NA": "Namibia", "VU": "Vanuatu", "NC": "New Caledonia", "NE": "Niger", "NF": "Norfolk Island", "NG": "Nigeria", "NZ": "New Zealand", "NP": "Nepal", "NR": "Nauru", "NU": "Niue", "CK": "Cook Islands", "XK": "Kosovo", "CI": "Ivory Coast", "CH": "Switzerland", "CO": "Colombia", "CN": "China", "CM": "Cameroon", "CL": "Chile", "CC": "Cocos Islands", "CA": "Canada", "CG": "Republic of the Congo", "CF": "Central African Republic", "CD": "Democratic Republic of the Congo", "CZ": "Czech Republic", "CY": "Cyprus", "CX": "Christmas Island", "CR": "Costa Rica", "CW": "Curacao", "CV": "Cape Verde", "CU": "Cuba", "SZ": "Swaziland", "SY": "Syria", "SX": "Sint Maarten", "KG": "Kyrgyzstan", "KE": "Kenya", "SS": "South Sudan", "SR": "Suriname", "KI": "Kiribati", "KH": "Cambodia", "KN": "Saint Kitts and Nevis", "KM": "Comoros", "ST": "Sao Tome and Principe", "SK": "Slovakia", "KR": "South Korea", "SI": "Slovenia", "KP": "North Korea", "KW": "Kuwait", "SN": "Senegal", "SM": "San Marino", "SL": "Sierra Leone", "SC": "Seychelles", "KZ": "Kazakhstan", "KY": "Cayman Islands", "SG": "Singapore", "SE": "Sweden", "SD": "Sudan", "DO": "Dominican Republic", "DM": "Dominica", "DJ": "Djibouti", "DK": "Denmark", "VG": "British Virgin Islands", "DE": "Germany", "YE": "Yemen", "DZ": "Algeria", "US": "United States", "UY": "Uruguay", "YT": "Mayotte", "UM": "United States Minor Outlying Islands", "LB": "Lebanon", "LC": "Saint Lucia", "LA": "Laos", "TV": "Tuvalu", "TW": "Taiwan", "TT": "Trinidad and Tobago", "TR": "Turkey", "LK": "Sri Lanka", "LI": "Liechtenstein", "LV": "Latvia", "TO": "Tonga", "LT": "Lithuania", "LU": "Luxembourg", "LR": "Liberia", "LS": "Lesotho", "TH": "Thailand", "TF": "French Southern Territories", "TG": "Togo", "TD": "Chad", "TC": "Turks and Caicos Islands", "LY": "Libya", "VA": "Vatican", "VC": "Saint Vincent and the Grenadines", "AE": "United Arab Emirates", "AD": "Andorra", "AG": "Antigua and Barbuda", "AF": "Afghanistan", "AI": "Anguilla", "VI": "U.S. Virgin Islands", "IS": "Iceland", "IR": "Iran", "AM": "Armenia", "AL": "Albania", "AO": "Angola", "AQ": "Antarctica", "AS": "American Samoa", "AR": "Argentina", "AU": "Australia", "AT": "Austria", "AW": "Aruba", "IN": "India", "AX": "Aland Islands", "AZ": "Azerbaijan", "IE": "Ireland", "ID": "Indonesia", "UA": "Ukraine", "QA": "Qatar", "MZ": "Mozambique"};

                            var countriesSelect = document.createElement('select');
                            countriesSelect.setAttribute('class', 'form-control');
                            countriesSelect.setAttribute('name', 'country');

                            var baseCountryOption = document.createElement('option');
                            baseCountryOption.setAttribute('value', null);
                            baseCountryOption.innerHTML = 'Seleccioná un país';

                            countriesSelect.appendChild(baseCountryOption);

                            for (var key in countriesObject) {
                              console.log(key);
                              var newCountryOption = document.createElement('option');
                              newCountryOption.setAttribute('value', key);
                              newCountryOption.innerHTML = countriesObject[key];

                              countriesSelect.appendChild(newCountryOption);
                            }
                            console.log(countriesObject, countriesSelect);

                            var paisDiv = document.getElementById('paisDiv');
                            paisDiv.appendChild(countriesSelect);
                          }

                          generateCountriesSelect();
                        </script>


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
                                $seniorities = [NULL => 'No especifica',
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
                          @foreach ($userSkills as $userSkill)
                          <script>
                            var query;
                            addSkillSelector();
                            query = 'skillSelectorDiv' + (addSkillButton.counter - 1);
                            console.log(query);
                            var currentSkillSelectorDiv = document.getElementById(query);
                            var currentSkillSelector = currentSkillSelectorDiv.children[0];
                            var currentSenioritySelector =  currentSkillSelectorDiv.children[1];

                            currentSkillSelector.children[{{$userSkill->skill_id}}].selected = true;
                            var key;
                            var seniority_level = '<?=$userSkill->seniority_level?>';
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
                            <div class="col-md-6 col-md-offset-4">
                                <button type="submit" class="btn btn-primary">
                                    Editar
                                </button>
                            </div>
                        </div>
                        <script type="text/javascript">

                          window.addEventListener("load", function() {
                            var name               = document.querySelector("#name");
                            var surname            = document.querySelector("#surname");
                            var username           = document.querySelector("#username");
                            var email              = document.querySelector("#email");

                            var nameDiv             = document.querySelector("#nameDiv");
                            var surnameDiv          = document.querySelector("#surnameDiv");
                            var usernameDiv         = document.querySelector("#usernameDiv");
                            var emailDiv            = document.querySelector("#emailDiv");

                            name.addEventListener("blur", function() {
                              if (this.value == "") {
                                if (!nameDiv.children[1].children[1]) {
                                  var span = document.createElement("span");
                                  span.setAttribute('class', 'help-block');
                                  span.innerHTML = "<strong> Por favor, ingresá tu nombre </strong>";
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
                                  span.innerHTML = "<strong> Por favor, ingresá tu apellido </strong>";
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
                          });
                        </script>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>



@endsection
