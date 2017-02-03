<?php

namespace App\Http\Controllers;
use App\Forms;
use App\HeaderPlants;
use Illuminate\Http\Request;

class FormGeneratorController extends Controller {
	public function index() {

		return view('formGenerator.index')->with('forms', Forms::paginate(30));
	}
	public function store(Request $request) {
		// dd($request->all());
		//

		$this->validate($request, [
			'name' => 'required|min:5',
			'description' => 'required|min:10|max:60',

		]);
		// dd('deberia mostrar esto');
		$form = new Forms;
		$form->name = $request->input('name');
		$form->description = $request->input('description');
		$form->headers = arrayOrs($request);
		$form->save();
		return redirect()->route('generador-de-formularios.index');

		// return view('formGenerator.form')->with('ors', $form->headers);
	}
	public function create() {

		return view('formGenerator.create')->with('headerPlants', HeaderPlants::all());

	}
	public function show($form) {
		$form = Forms::find($form);

		if (empty($form->name)) {
			return redirect()->route('generador-de-formularios.index');

		}
		return view('formGenerator.form')->with('form', $form);
	}
}
