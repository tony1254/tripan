<?php

namespace App\Http\Controllers\Upload;
use App\Http\Controllers\Controller;
use App\User;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;

class GfmisController extends Controller {
	/**
	 * Create a new controller instance.
	 *
	 * @return void
	 */
	public function __construct() {
		$this->middleware('auth');
	}
	/**
	 * [store description]
	 * @param  Request $request [description]
	 * @return [type]           [description]
	 */
	public function store(Request $request) {

		$path = public_path() . '/uploads/GFMIS/';
		$files = $request->file('file');

		foreach ($files as $file) {
			$fileName = date("Y-m-d") . ".xlsx"; //$file->getClientOriginalName();
			$file->move($path, $fileName);

		}
	}
	public function index() {

		return view('upload.gfmis');
	}

	public function create() {

		Excel::load(public_path() . '/uploads/GFMIS/' . date("Y-m-d") . '.xlsx', function ($reader) {
			$this->validacion($reader->get());

			foreach ($reader->get() as $value) {
				dd($value);
				User::create([
					'name' => $value->name,
					'email' => $value->email,
					'password' => $value->password,
				]);
			}

		});

		return view('upload.gfmis');
	}
	public function validacion($values) {
		$errores = 0;

/*		foreach ($values[0] as $keys => $value) {
DB::beginTransaction();
DB::rollback();
DB::comit()
https://laravel.com/docs/master/validation#manually-creating-validators
echo "<p> 'Modelo::where('name',$keys)->first()'</p>";
}
exit(var_dump("nada"));*/
		$var = "";
		$a = ["objectid",
			"pais",
			"fondo",
			"finca",
			"rodal",
			"subrodal",
			"especie",
			"municipio",
			"zona",
			"area",
			"origen_clon",
			"sup_ha",
			"fecha_plantacion",
			"supervisor",
			"guarda_forestal",
			"fecha_ult_raleo",
			"fecha_ult_poda",
			"dencidad_ult_poda",
			"ap",
			"edad_actual",
			"clon",
		];
		echo var_dump($a);
		foreach ($values[0] as $key => $value) {
			$ok = array_search($key, $a);
			($ok > -1) ?: $var .= $key . ';';

		}
// echo date_format($values[2]->fecha_plantacion, 'd-m-Y');
		dd($var, $values[2]);
		foreach ($values as $user) {
			$var = $user->var;
			dd($var);
			$name = $user->name;
			$email = $user->email;
			$password = $user->password;
			if ($password == null) {
				\Alert::danger('password es obligatorio');
				$errores++;
			}
			if (1 == User::where('email', $email)->count()) {
				\Alert::danger('Ya exite usuario');
				$errores++;
			}
		}

		($errores > 0) ? exit(view('upload.gfmis')) : \Alert::success(trans('alerts.success'));
		return false;
	}
}
