<?php

namespace App\Http\Controllers;

use App\Country;
use App\Fund;
use App\SubRodal;
use Illuminate\Http\Request;

class SubRodalController extends Controller {
	public function validation(Request $request, $value = null) {
		// dd(var_dump($request->all()));
		return $this->validate($request, [
			'objectid' => ($value) ? 'required|numeric|max:20|unique:subRodals,objectid,' . $value->id : 'required|numeric|unique:subRodals',

			'country' => 'required|min:2|max:2|alpha|exists:countries,iso2',
			'fund' => 'required|min:3|exists:funds,name',
			'property' => 'required|min:1|numeric',
			'rodal' => 'required|min:1|numeric',
			'subrodal' => 'required|min:1|numeric',
			'surface' => 'required|numeric',

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
		$funds = Fund::all();

		return view('subRodal.create')->with('countries', $countries)->with('funds', $funds);

	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @param  \Illuminate\Http\Request  $request
	 * @return \Illuminate\Http\Response
	 */
	public function store(Request $request) {
		$this->validation($request);

		$exist = SubRodal::where('country', $request->input('country'))
			->where('fund', $request->input('fund'))
			->where('property', $request->input('property'))
			->where('rodal', $request->input('rodal'))
			->where('subrodal', $request->input('subrodal'))
			->first();
		if (count($exist)) {
			\Alert::success("Se encontro un subRodal igual.");
			return redirect()->route('subRodal.show', ['subRodal' => $exist->id]);
		}
		$newValues = array_filter($request->toArray(), "strlen");
		$subRodal = SubRodal::create($newValues);

		$subRodal->state = true;
		$subRodal->save();
		// dd($request->toArray(), $newValues);
		return redirect()->route('subRodal.show', ['subRodal' => $subRodal->id]);

	}

	/**
	 * Display the specified resource.
	 *
	 * @param  \App\SubRodal  $subRodal
	 * @return \Illuminate\Http\Response
	 */
	public function show(SubRodal $subRodal) {
		return view('subRodal.show')->with('subRodal', $subRodal);
		//
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  \App\SubRodal  $subRodal
	 * @return \Illuminate\Http\Response
	 */
	public function edit(SubRodal $subRodal) {
		$countries = Country::all();
		$funds = Fund::all();
		return view('subRodal.edit')->with('subRodal', $subRodal)->with('countries', $countries)->with('funds', $funds);
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  \Illuminate\Http\Request  $request
	 * @param  \App\SubRodal  $subRodal
	 * @return \Illuminate\Http\Response
	 */
	public function update(Request $request, SubRodal $subRodal) {
		$this->validation($request, $subRodal);

		\Alert::success("Se modifico un subRodal.");

		$newValues = array_filter($request->toArray(), "strlen");
		$subRodal = SubRodal::updateOrCreate(['id' => $subRodal->id], $newValues);

		$subRodal->state = true;
		$subRodal->save();
		// dd($request->toArray(), $newValues);
		return redirect()->route('subRodal.show', ['subRodal' => $subRodal->id]);
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
