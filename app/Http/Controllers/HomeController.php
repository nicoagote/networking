<?php

namespace App\Http\Controllers;
use App;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

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
    public function home()
    {
        $skills = App\Skill::all();

        $data = compact('skills');

        return view('home', $data);
    }

    public function perfil($id)
    {
        $perfil = App\User::find($id);
        $data = compact('perfil');
        return view('perfil', $data);
    }

    public function editarPerfil()
    {
        $usuario = Auth::user();
        $data = compact('usuario');
        return view('editarperfil', $data);
    }

    public function crearProyecto()
    {
        $skills = App\Skill::all();

        $data = compact('skills');

        return view('crearproyecto', $data);
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

    public function editarProyecto()
    {
        return view('editarproyecto');
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
