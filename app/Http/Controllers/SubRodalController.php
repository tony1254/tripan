<?php

namespace App\Http\Controllers;

use App\Country;
use App\SubRodal;
use Illuminate\Http\Request;

class SubRodalController extends Controller {
	public function validation(Request $request) {
		return $this->validate($request, [
			'name' => 'required|max:20',
			'description' => 'required|min:5|max:25',

		]);

	}
	/**
	 * Display a listing of the resource.
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function index() {
		// dd("1");
		$subRodals = SubRodal::paginate(30);
		// dd($subRodals);
		return view('subRodal.index')->with('subRodals', $subRodals);
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function create() {
		$countries = Country::all();
		$array = [];
		foreach ($countries as $key => $country) {
			$array += [$country->id => $country->name];
		}
		return view('subRodal.create')->with('countries', $array);

	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @param  \Illuminate\Http\Request  $request
	 * @return \Illuminate\Http\Response
	 */
	public function store(Request $request) {
		//
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  \App\SubRodal  $subRodal
	 * @return \Illuminate\Http\Response
	 */
	public function show(SubRodal $subRodal) {
		//
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  \App\SubRodal  $subRodal
	 * @return \Illuminate\Http\Response
	 */
	public function edit(SubRodal $subRodal) {
		return view('subRodal.edit');

	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  \Illuminate\Http\Request  $request
	 * @param  \App\SubRodal  $subRodal
	 * @return \Illuminate\Http\Response
	 */
	public function update(Request $request, SubRodal $subRodal) {
		//
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  \App\SubRodal  $subRodal
	 * @return \Illuminate\Http\Response
	 */
	public function destroy(SubRodal $subRodal) {
		$subRodal->state = ($subRodal->state) ? 0 : 1;
		$subRodal->save();
		return redirect()->route('subRodal.index');}
}
