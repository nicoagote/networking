<?php

namespace App\Http\Controllers;
use App;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
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

        $displayPaginate = true;

        $data = compact('skills','proyecto','usuarios', 'show', 'displayPaginate');

        return view('home', $data);
    }

    public function buscar(Request $req) {
      // dd($req);
      $show = $req["show"];
      $buscador = $req["buscador"];
      $displayPaginate = false;

      $skillSelectors = $req['skillSelector'];
      if ($skillSelectors != null) {
        $skillQueries = [];
        foreach ($skillSelectors as $index) {
          $skillQueries[] = [
            'skill_id' => $req['skill' . $index],
            'seniority_level' => $req['seniority_level' . $index],
          ];
        }

        $proyecto = App\Project::where('active', '=', 'Y')->where("title", "like", "%$buscador%")->orWhere("short_description", "like", "%$buscador%")->orWhere("long_description", "like", "%$buscador%")->get();
        $usuarios = App\User::where('available', '=', 'Y')->where("name", "like", "%$buscador%")->orWhere("surname", "like", "%$buscador%")->orWhere("username", "like", "%$buscador%")->orWhere("email", "like", "%$buscador%")->get();
        foreach ($skillQueries as $query) {
          if ($query['seniority_level'] == null) {
            $projectSkillId = App\ProjectSkill::select('project_id')->where('skill_id', '=', $query['skill_id'])->get();

            $userSkillId = App\UserSkills::addselect('user_id')->where('skill_id', '=', $query['skill_id'])->get();
          } else {
            $projectSkillId = App\ProjectSkill::select('project_id')->where('skill_id', '=', $query['skill_id'])->where('seniority_level', '=', $query['seniority_level'])->get();

            $userSkillId = App\UserSkills::select('user_id')->where('skill_id', '=', $query['skill_id'])->where('seniority_level', '=', $query['seniority_level'])->get();
          }

          $projectIdArray = [];
          foreach ($projectSkillId as $arrayProject) {
            $projectIdArray[] = $arrayProject['project_id'];
          }

          $userIdArray = [];
          foreach ($userSkillId as $arrayUser) {
            $userIdArray[] = $arrayUser['user_id'];
          }

          $proyecto = $proyecto->whereIn('id', $projectIdArray);
          $usuarios = $usuarios->whereIn('id', $userIdArray);
        }
      } else {
        $proyecto = App\Project::where('active', '=', 'Y')->where("title", "like", "%$buscador%")->orWhere("short_description", "like", "%$buscador%")->orWhere("long_description", "like", "%$buscador%")->paginate(10);
        $usuarios = App\User::where('available', '=', 'Y')->where("name", "like", "%$buscador%")->orWhere("surname", "like", "%$buscador%")->orWhere("username", "like", "%$buscador%")->orWhere("email", "like", "%$buscador%")->paginate(10);
      }

      $skills = App\Skill::all();
      $data = compact("proyecto","usuarios","skills", "show", "displayPaginate");

      if($show=="both"){
        return view("home", $data);
      }elseif($show=="usuario"){
        return view("home", $data);
      }elseif($show=="proyecto") {
        return view("home", $data);
      }
    }

    public function buscarGet() {
        $skills = App\Skill::all();

        $proyecto = App\Project::orderBy('created_at', 'desc')->paginate(10);
        $usuarios = App\User::paginate(10);

        $displayPaginate = true;
        $show = 'both';

        $data = compact('skills','proyecto','usuarios', 'show', 'displayPaginate');

      return view('home', $data);
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
        $skills = App\Skill::all();
        $userSkills = App\UserSkills::all()->where('user_id', '=', $user->id);

        $data = compact('user', 'skills', 'userSkills');
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
      $id = Auth::user()->id;
      DB::table('users_skills')->where('user_id', '=', $id)->delete();

      $skillSelectors = $req['skillSelector'];

      foreach ($skillSelectors as $index) {
        $userSkill = new App\UserSkills();
        $userSkill->user_id = $id;
        $userSkill->skill_id = $req['skill' . $index];
        $userSkill->seniority_level = $req['seniority_level' . $index];
        echo "<pre>";
        var_dump($userSkill);
        $userSkill->save();
      }

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
        $projectSkills = App\ProjectSkill::all()->where('project_id', '=', $proyecto->id);

        $data = compact('skills','proyecto', 'projectSkills');

        return view('editarproyecto', $data);
    }

    public function guardarProyectoEditado(Request $req) {
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

      $id = $req['project_id'];
      $project = [];
      $project['title'] = $req['title'];
      $project['creator_id'] = Auth::user()->id;
      $project['short_description'] = $req['short_description'];
      $project['long_description'] = $req['long_description'];
      $project['active'] = isset($req['active'])? 'Y' : 'N';

      DB::table('projects')->where('id', '=', $id)->update($project);

      $skillSelectors = $req['skillSelector'];

      // dd($skillSelectors);

      DB::table('projects_skills')->where('project_id', '=', $id)->delete();

      foreach ($skillSelectors as $index) {
        $projectSkill = new App\ProjectSkill();
        $projectSkill->project_id = $id;
        $projectSkill->skill_id = $req['skill' . $index];
        $projectSkill->seniority_level = $req['seniority_level' . $index];
        echo "<pre>";
        var_dump($projectSkill);
        $projectSkill->save();
      }
      // dd('---------------------------------------');

      return redirect('misproyectos');
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

        $user_relationships = Auth::User()->relationships->map(function ($u) {
          return $u->id;
        });

        $usuarios = App\User::all()
            ->whereNotIn('id', $user_relationships);

        $data = compact('contactos', 'solicitudes', 'bloqueados', 'usuarios');

        return view('contactos', $data);
    }

    public function request(Request $req) {
      if (isset($req["request_id"])) {
        try {
          DB::table('user_relationships')
                ->where('relating_user_id', $req['request_id'])
                ->where('related_user_id', Auth::user()->id)
                ->update(['state' => 'contact']);
          return redirect('/contactos');
        } catch (Exception $e) {
          return $e->getErrorMessage();
        }
      } else {
        try {
          DB::table('user_relationships')->insert(
              ['relating_user_id' => Auth::user()->id, 'state' => 'request', 'related_user_id' => $req['send_request_id']]);
          return redirect('/contactos');
        } catch (Exception $e) {
          return $e->getErrorMessage();
        }
      }

    }

    public function interactionPerfil(Request $req) {
      if (isset($req["request_id"])) {
        try {
          DB::table('user_relationships')
                ->where('relating_user_id', $req['request_id'])
                ->where('related_user_id', Auth::user()->id)
                ->update(['state' => 'contact']);
          return redirect('/perfil{{id}}');
        } catch (Exception $e) {
          return $e->getErrorMessage();
        }
      } else {
        try {
          DB::table('user_relationships')->insert(
              ['relating_user_id' => Auth::user()->id, 'state' => 'request', 'related_user_id' => $req['send_request_id']]);
          return redirect('/perfil{{id}}');
        } catch (Exception $e) {
          return $e->getErrorMessage();
        }
      }


      }

    public function faqs()
    {
        return view('faqs');
    }


}
