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
		$errores = [];
		foreach ($users as $user) {

			$name = $user->name;
			$email = $user->email;
			$password = $user->password;

			$error = ($password == null) ? 'password es obligatorio' : false;
			($error) ? array_push($errores, $error) : false;
			$error = (1 == User::where('email', $email)->count()) ? 'Ya exite usuario' : false;
			($error) ? array_push($errores, $error) : false;

		}

		(count($errores) > 0) ? exit(view('upload.form')->with('error', $errores)) : false;
		return false;
	}
}
