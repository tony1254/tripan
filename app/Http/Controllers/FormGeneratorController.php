<?php

namespace App\Http\Controllers;
use App\HeaderPlants;
use Illuminate\Http\Request;

class FormGeneratorController extends Controller {
	public function index() {

		return view('formGenerator.index')->with('headerPlants', HeaderPlants::all());
	}
	public function store(Request $request) {
		return view('formGenerator.form')->with('ors', arrayOrs($request));
	}
}
