<?php

namespace App\Http\Controllers;
use App;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\Rule;
use Collection;
use Storage;


class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function home($show = 'both')
    {
        $skills = App\Skill::all();
        $proyecto = App\Project::orderBy('created_at', 'desc')->paginate(10);
        $usuarios = App\User::paginate(10);

        $data = compact('skills','proyecto','usuarios', 'show');

        return view('home', $data);
    }

    public function buscar(Request $req) {



      if($req["filtrar"]=="busqueda"){
        $buscador = $req->input("buscador");
        $proyecto = App\Project::where("title", "like", "%$buscador%")->paginate(10);
        $usuarios = App\User::where("name", "like", "%$buscador%")->orWhere("surname", "like", "%$buscador%")->paginate(10);
        $skills = App\Skill::all();
        $data = compact("proyecto","usuarios","skills");
        return view("home/both", $data);
      }elseif($req["filtrar"]=="usuarios"){
        $buscador = $req->input("buscador");
        $usuarios = App\User::where("name", "like", "%$buscador%")->orWhere("surname", "like", "%$buscador%")->paginate(10);
        $proyecto = App\Project::where("title", "like", "%null%")->paginate(0); ;
        $skills = App\Skill::all();
        $data = compact("proyecto","usuarios","skills");
        return view("home/usuarios", $data);
      }elseif($req["filtrar"]=="proyectos") {
        $buscador = $req->input("buscador");
        $proyecto = App\Project::where("title", "like", "%$buscador%")->paginate(10);
        $usuarios = App\User::where("name", "like", "%null%")->orWhere("surname", "like", "%$buscador%")->paginate(0);
        $skills = App\Skill::all();
        $data = compact("proyecto","usuarios","skills");
        return view("home/proyectos", $data);
      }



    }




    public function perfil($id)
    {
          $perfil = App\User::find($id);
          $data = compact('perfil');
          return view('perfil', $data);
    }

    public function perfilpropio()
    {
          $perfil = Auth::User();
          $data = compact('perfil');
          return view('perfilpropio', $data);
    }

    public function editarPerfil()
    {
        $user = Auth::user();
        $data = compact('user');
        return view('editarperfil', $data);
    }

    public function guardarPerfil(Request $req) {
      $rules = [
        'name'      => 'required|string|max:191',
        'surname'   => 'required|string|max:191',
        'username'  => ['required',
                        'string',
                        'max:191',
                        Rule::unique('users')->ignore(Auth::user()->id),
                      ],
        'email'     => ['required',
                        'string',
                        'email',
                        'max:191',
                        Rule::unique('users')->ignore(Auth::user()->id),
                      ],
        'phone' => 'max:191',
        'git' => 'max:191',
        'linkedin' => 'max:191',
        'description' => 'max:191',
      ];

      $messages = [
        'name.required' => 'Tu nombre no puede quedarse vacío',
        'name.max' => 'Lo sentimos. Tu nombre debe ser más corto que los 191 caracteres.',
        'surname.required' => 'Tu apellido no puede quedarse vacío',
        'surname.max' => 'Lo sentimos. Tu apellido debe ser más corto que los 191 caracteres.',
        'username.required' => 'Tu nombre de usuario no puede quedarse vacío',
        'username.max' => 'Lo sentimos. Tu nombre de usuario debe ser más corto que los 191 caracteres.',
        'email.required' => 'Tu email no puede quedarse vacío',
        'phone.max' => 'Lo sentimos. Tu telefono debe ser más corto que los 191 caracteres.',
        'git.max' => 'Lo sentimos. El link a tu cuenta de git debe ser más corto que los 191 caracteres.',
        'linkedin.max' => 'Lo sentimos. Tu link a tu cuenta de linkedin debe ser más corto que los 191 caracteres.',
        'description.max' => 'Lo sentimos. Tu descripcion personal debe ser más corto que los 191 caracteres.',
      ];

      $this->validate($req, $rules, $messages);

      $user = [];
      $user['name'] = $req['name'];
      $user['surname'] = $req['surname'];
      $user['username'] = $req['username'];
      $user['email'] = $req['email'];
      $user['password'] = Auth::user()->password;
      $user['phone'] = $req['phone'];
      $user['date_of_birth'] = $req['date_of_birth'];
      $user['git'] = $req['git'];
      $user['linkedin'] = $req['linkedin'];
      $user['description'] = $req['description'];
      $user['available'] = isset($req['available'])? 'Y' : 'N';
      $user['country'] = $req['country'];

      if (isset($req['profile_picture_file_location'])) {
        // dd($req['profile_picture_file_location']);
        $profilePictureName = 'perfil' . Auth::user()->id . '.' . $req->profile_picture_file_location->extension();
        $profilePictureFolder = 'profile_pictures';
        $path = $req->profile_picture_file_location->storeAs('/' . $profilePictureFolder, $profilePictureName, 'public');
        $user['profile_picture_file_location'] = $profilePictureFolder . '/' . $profilePictureName;
      }
      if (isset($req['curriculum_file_location'])) {
        $curriculumName = 'curriculum' . Auth::user()->id . '.' . $req->curriculum_file_location->extension();
        $curriculumFolder = '/curriculums';
        $path = $req->curriculum_file_location->storeAs($curriculumFolder, $curriculumName, 'public');
        $user['curriculum_file_location'] = $curriculumFolder."/".$curriculumName;
      }

      // dd($user);

      Auth::user()->update($user);

      return redirect('perfil');
    }

    public function crearProyecto()
    {
        $skills = App\Skill::all();

        $data = compact('skills');

        return view('crearproyecto', $data);
    }

    public function editarProyecto($id)
    {
        $skills = App\Skill::all();
        $proyecto = App\Project::find($id);


        $data = compact('skills','proyecto');

        return view('editarproyecto', $data);
    }

    public function guardarProyecto(Request $req) {
      $rules = [
        'title' => 'required|string|max:191',
        'short_description' => 'required|string|max:140',
        'long_description' => 'required|string|max:1400',
        'skillSelector' => 'required',
      ];
      $messages = [
        'title.required' => 'Por favor completá el campo título.',
        'title.max' => 'El título no puede superar los 191 caracteres.',
        'short_description.required' => 'Por favor completá la presentación de tu proyecto. Recimendamos que sea un resumen en una o dos oraciones de tu idea.',
        'short_description.max' => 'La descripción corta de tu proyecto no puede superar los 140 caracteres.',
        'long_description.required' => 'Por favor completá la descripción más detallada de tu proyecto. Recomendamos que acá incluyas una descripcion de uno o dos párrafos más completa de tu idea y sus alcances.',
        'long_description.max' => 'La descripción más detallada de tu proyecto no puede superar los 1400 caracteres.',
        'skillSelector.required' => 'Por favor especifique que habilidades te serían útiles para este proyecto (por lo menos una, pero recomendamos no menos que 3, y no mas que 5).',
      ];

      $this->validate($req, $rules, $messages);

      if(isset($req->id)) {
      } else {
        $project = new App\Project();
        $project->title = $req['title'];
        $project->creator_id = Auth::user()->id;
        $project->short_description = $req['short_description'];
        $project->long_description = $req['long_description'];
        $project->active = isset($req['active'])? 'Y' : 'N';
      }

      $project->save();

      $skillSelectors = $req['skillSelector'];

      foreach ($skillSelectors as $index) {
        $projectSkill = new App\ProjectSkill();
        $projectSkill->project_id = App\Project::all()->last()->id;
        $projectSkill->skill_id = $req['skill' . $index];
        $projectSkill->seniority_level = $req['seniority_level' . $index];
        $projectSkill->save();
      }

      return redirect('misproyectos');
    }

    public function misProyectos()
    {
        $projects = Auth::User()->projects;
        $relatedProjectUser = App\ProjectUser::all()->filter(function($projectUser) {
          if($projectUser['user_id'] == Auth::user()->id && $projectUser['state'] == 'part_of') {
            return $projectUser;
          }
        });
        $projectsPartOf = collect([]);
        foreach ($relatedProjectUser as $projectUser) {
          $projectsPartOf[] = App\Project::find($projectUser['project_id']);
        }

        $recentProject = collect([]);

        $data = compact('projects', 'projectsPartOf', 'recentProject');

        // dd($data);

        return view('misproyectos', $data);
    }

    public function proyecto($id)
    {

        $proyecto = App\Project::find($id);
        $data = compact('proyecto');
        return view('proyecto', $data);
    }

    public function contacto()
    {
        $contactos = Auth::User()->contacts;
        $solicitudes = Auth::User()->pendingRequests;
        $bloqueados = Auth::User()->blocked;

        $data = compact('contactos', 'solicitudes', 'bloqueados');

        return view('contactos', $data);
    }

    public function faqs()
    {
        return view('faqs');
    }


}
