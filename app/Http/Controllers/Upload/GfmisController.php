<?php

namespace App\Http\Controllers\Upload;
use App\Http\Controllers\Controller;
use App\SubRodal;
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
			// dd($reader->get()[2]->objectid);
			$this->validacion($reader->get());
			$rows = 0;
			foreach ($reader->get() as $value) {
				// echo (var_dump($value->orden));
				if ($value->orden) {
					// dd($value);

					$rows++;
					SubRodal::updateOrCreate(
						['id' => $value->orden],
						[
							'objectid' => $value->objectid,
							'country' => $value->pais,
							'fund' => $value->fondo,
							'property' => $value->finca,
							'rodal' => $value->rodal,
							'subrodal' => $value->subrodal,
							'specie' => $value->especie,
							'municipality' => $value->municipio,
							'zona' => $value->zona,
							'area' => $value->area,
							'area' => $value->area,
							'percent_clon' => $value->origen_clon,
							'surface' => $value->sup_ha,
							'plantation_date' => $value->fecha_plantacion,
							'supervisor' => $value->supervisor,
							'fores_guard' => $value->guarda_forestal,
							'raleo_date' => $value->fecha_ult_raleo,
							'pruning_date' => $value->fecha_ult_poda,
							'pruning_density' => $value->dencidad_ult_poda,

							'state' => 1,
						]);
				}
			}
			if ($rows == 0) {
				\Alert::danger('No Fue posible almacenar ningun registro.');
			} else {
				\Alert::success($rows . " Registros Fueron Afectados.");
			}

		});
		return redirect()->route('upload.GFMIS.index');
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
		$a = headersGfmisArray();
		// echo var_dump($a);
		foreach ($values[0] as $key => $value) {
			$ok = array_search($key, $a);
			($ok > -1) ?: $var .= '*' . $key . '; ';

		}
// echo date_format($values[2]->fecha_plantacion, 'd-m-Y');

		if ($var !== "") {

			\Alert::warning('Advertencia los siguientes columnas adicionales no fueron tomados en cuenta:   ' . $var);
		}
		//
		// dd($var, $values[2]);
		// foreach ($values as $value) {
		// 	$var = $value->var;
		// 	dd($var);
		// 	$name = $value->name;
		// 	$email = $value->email;
		// 	$password = $value->password;
		// 	if ($password == null) {
		// 		\Alert::danger('password es obligatorio');
		// 		$errores++;
		// 	}
		// 	if (1 == User::where('email', $email)->count()) {
		// 		\Alert::danger('Ya exite usuario');
		// 		$errores++;
		// 	}
		// }

		// ($errores > 0) ? exit(view('upload.gfmis')) : \Alert::success(trans('alerts.success'));
		return false;
	}
}
