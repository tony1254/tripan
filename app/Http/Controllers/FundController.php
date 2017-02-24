<?php

namespace App\Http\Controllers;

use App\Fund;
use Illuminate\Http\Request;

class FundController extends Controller {
	public function validation(Request $request, $value = null) {

		return $this->validate($request, [
			'name' => ($value) ? 'required|max:20|unique:funds,name,' . $value->id : 'required|max:20|unique:funds',
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
		$Funds = Fund::where('state', true)->paginate(30);
		// dd($Funds);
		return view('fund.index')->with('funds', $Funds);
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function create() {
		return view('fund.create');
		//
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @param  \Illuminate\Http\Request  $request
	 * @return \Illuminate\Http\Response
	 */
	public function store(Request $request) {
		$this->validation($request);
		$fund = new Fund;
		$fund->name = $request->input('name');
		$fund->description = $request->input('description');
		$fund->save();
		return redirect()->route('fund.index');
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  \App\Fund  $fund
	 * @return \Illuminate\Http\Response
	 */
	public function show(Fund $fund) {
		//
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  \App\Fund  $fund
	 * @return \Illuminate\Http\Response
	 */
	public function edit(Fund $fund) {
		return view('fund.edit')->with('fund', $fund);
		//
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  \Illuminate\Http\Request  $request
	 * @param  \App\Fund  $fund
	 * @return \Illuminate\Http\Response
	 */
	public function update(Request $request, Fund $fund) {
		$this->validation($request, $fund);
		$fund->name = $request->input('name');
		$fund->description = $request->input('description');
		$fund->save();
		return redirect()->route('fund.index');
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  \App\Fund  $fund
	 * @return \Illuminate\Http\Response
	 */
	public function destroy(Fund $fund) {
		$fund->state = ($fund->state) ? 0 : 1;
		$fund->save();
		return redirect()->route('fund.index');
	}
}
