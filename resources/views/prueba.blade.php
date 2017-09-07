@extends('layouts/welcomeLayout')

@section('contenido')

  {{$usuarios->first()->projects->first()->projectSkills}}
  <div class="container">

    <?php
      $usuario = $usuarios->find(2);
      foreach ($usuario->endorsed($usuario->skills->first()) as $usuario) {
        echo ($usuario->name) . " " . $usuario->surname;
        echo "<br><br>";
      }
    ?>
    <ul style='display:block'> <h2>Usuarios</h2>
      @foreach ($usuarios as $usuario)
        <li> <h3>{{$usuario->name}} {{$usuario->surname}}</h3>
          <ul> <h4>Sus proyectos</h4>
            @foreach ($usuario->projects as $proyecto)
              <li>
                {{$proyecto->title}}: {{$proyecto->short_description}}
              </li>
            @endforeach
          </ul>
          <ul>  <h4>Especialidades:</h4>
            @foreach ($usuario->skills as $especialidad)
              <li style='background-color:'{{$especialidad->color}}>
                {{$especialidad->name}}
              </li>
              <li>
                {{$especialidad->getImage()}}
              </li>
            @endforeach
          </ul>
          <h4>Sus relaciones:</h4>
          <ul>
            <h4>Sus contactos:</h4>
            @if ($usuario->contacts != [])
            @foreach ($usuario->contacts as $contact)
              <li>
                {{$contact->name}} {{$contact->surname}}
              </li>
            @endforeach
            @endif
            <br>
            @if ($usuario->sentRequests != [])
            <h4>Sus requests:</h4>
              @foreach ($usuario->sentRequests as $user)
                <li>
                  {{$user->name}} {{$user->user}}
                </li>
              @endforeach
            @endif
            @if ($usuario->sentRequests != [])
            <h4>Sus requests pendientes:</h4>
            @foreach ($usuario->pendingRequests as $user)
              <li>
                {{$user->name}} {{$user->user}}
              </li>
            @endforeach
            @endif
            @if ($usuario->blocked != [])
            <h4>Sus usuarios bloqueados:</h4>
              @foreach ($usuario->blocked as $blockedUser)
                <li>
                  {{$blockedUser->name}} {{$blockedUser->surname}}
                </li>
              @endforeach
            @endif
            @if ($usuario->blockedBy != [])
            <h4>Es bloqueado por:</h4>
              @foreach ($usuario->blockedBy as $blockedBy)
                <li>
                  {{$blockedBy->name}} {{$blockedBy->surname}}
                </li>
              @endforeach
            @endif
          </ul>
          <ul> <h4>Reviews que le hicieron:</h4>
            <ul>
              @foreach ($usuario->reviews as $review)
                @if($review->overall == 'P')
                  <li style="background-color:green; color:white">
                    {{$review->reviewer->name}} {{$review->reviewer->surname}}
                    {{$review->review}}
                  </li>
                @else
                <li style="background-color:red; color:white">
                  {{$review->reviewer->name}} {{$review->reviewer->surname}}
                  {{$review->review}}
                </li>
                @endif
              @endforeach
            </ul>
          </ul>
        </li>
      @endforeach
    </ul>
    <ul> <h2>Proyectos</h2>
      @foreach ($proyectos as $proyecto)
        <li @if($proyecto->active == 'Y')
            style="color: green"
            @else
            style="color: red"
            @endif>
            <h3>{{$proyecto->title}}</h3>, by <em>{{$proyecto->creator->name}} {{$proyecto->creator->surname}}</em>
            <ul> <h4>Usuarios que participan de este proyecto:</h4>
              @foreach ($proyecto->users as $user)
              <li>
                {{$user->name}} {{$user->surname}}
              </li>
              @endforeach
            </ul>
            <br>
            <p style='font-size:0.5em; max-width: 600px'>{{$proyecto->long_description}}</p>
        </li>
      @endforeach
    </ul>

    <ul> <h2>Especialidades</h2>
      @foreach ($especialidades as $especialidad)
        <li>
          <ul> <h3>{{$especialidad->name}}</h3>
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
