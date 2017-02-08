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
		// dd($request->all());
		$form = new Forms;
		$form->name = $request->input('name');
		$form->description = $request->input('description');
		// $form->headers = arrayOrs($request);
		$form->headers = implode("', '", array_keys($request->all()));
		// dd($form->headers, arrayOrs($form->headers));
		/* $form->headers =  implode(',', $request->all()); */
		$form->save();
		return redirect()->route('FormGenerator.index');

		// return view('formGenerator.form')->with('ors', $form->headers);
	}
	public function create() {

		return view('formGenerator.create')->with('headerPlants', HeaderPlants::all());
	}
	public function show(Forms $FormGenerator) {
		// dd($FormGenerator->toArray());

		// dd(catalogMaker($FormGenerator->headers));
		if (empty($FormGenerator->name)) {
			return redirect()->route('FormGenerator.index');

		}
		return view('formGenerator.form')->with('form', $FormGenerator);
	}
	public function edit(Forms $FormGenerator) {
		$forms = $FormGenerator;

		if (empty($forms->name)) {
			return redirect()->route('FormGenerator.index');

		}
		return view('formGenerator.form')->with('form', $forms);
	}
}
