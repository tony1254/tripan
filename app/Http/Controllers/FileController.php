<?php

namespace App\Http\Controllers;
use App\User;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;

class FileController extends Controller {
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

		$path = public_path() . '/uploads/';
		$files = $request->file('file');

		foreach ($files as $file) {
			$fileName = "book.xlsx"; //$file->getClientOriginalName();
			$file->move($path, $fileName);

		}
	}
	public function index() {
		return view('upload.form');
	}

	public function create() {

		Excel::load(public_path() . '/uploads/' . 'book.xlsx', function ($reader) {
			$this->validacion($reader->get());

			foreach ($reader->get() as $user) {
				User::create([
					'name' => $user->name,
					'email' => $user->email,
					'password' => $user->password,
				]);
			}

		});

		return view('upload.form');
	}
	public function validacion($users) {
		$errores = 0;

/*		foreach ($users[0] as $keys => $value) {
DB::beginTransaction();
DB::rollback();
DB::comit()
https://laravel.com/docs/master/validation#manually-creating-validators
echo "<p> 'Modelo::where('name',$keys)->first()'</p>";
}
exit(var_dump("nada"));*/

		foreach ($users as $user) {
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

		($errores > 0) ? exit(view('upload.form')) : \Alert::success(trans('alerts.success'));
		return false;
	}
}
