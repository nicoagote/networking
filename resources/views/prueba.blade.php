@extends('layouts.app')

@section('content')
  <div class="container">
    <ul>
      @foreach ($usuarios as $usuario)
        <li> {{$usuario->name}} {{$usuario->surname}}
          <ul> <b>Sus proyectos</b>
            @foreach ($usuario->projects as $proyecto)
              <li>
                {{$proyecto->title}}: {{$proyecto->short_description}}
              </li>
            @endforeach
          </ul>
          <ul>  <b>Especialidades:</b>
            @foreach ($usuario->skills as $especialidad)
              <li style='background-color:'{{$especialidad->color}}>
                {{$especialidad->name}}
              </li>
            @endforeach
          </ul>
        </li>
      @endforeach
    </ul>
    <ul> Proyectos
      @foreach ($proyectos as $proyecto)
        <li> {{$proyecto->title}}, by {{$proyecto->user->name}} {{$proyecto->user->surname}} ({{$proyecto->active}}): {{$proyecto->long_description}}
        </li>
      @endforeach
    </ul>

    <ul> Especialidades
      @foreach ($especialidades as $especialidad)
        <li>
          <ul> {{$especialidad->name}}
            @foreach ($especialidad->users as $user)
              <li>
                {{$user->name}} {{$user->surname}}
              </li>
            @endforeach
          </ul>
        </li>
      @endforeach
    </ul>
  </div>
@endsection
