<?php

namespace App\Http\Controllers;

use App\Title;
use Illuminate\Http\Request;

class TitleController extends Controller {

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
		$Titles = Title::paginate(30);
		// dd($Titles);
		return view('title.index')->with('titles', $Titles);
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function create() {
		return view('title.create');

	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @param  \Illuminate\Http\Request  $request
	 * @return \Illuminate\Http\Response
	 */
	public function store(Request $request) {
		$this->validation($request);
		$title = new Title;
		$title->name = $request->input('name');
		$title->description = $request->input('description');
		$title->save();
		return redirect()->route('title.index');
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  \App\Title  $title
	 * @return \Illuminate\Http\Response
	 */
	public function show(Title $title) {
		//
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  \App\Title  $title
	 * @return \Illuminate\Http\Response
	 */
	public function edit(Title $title) {
		return view('title.edit')->with('title', $title);

	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  \Illuminate\Http\Request  $request
	 * @param  \App\Title  $title
	 * @return \Illuminate\Http\Response
	 */
	public function update(Request $request, Title $title) {
		$this->validation($request);
		$title->name = $request->input('name');
		$title->description = $request->input('description');
		$title->save();
		return redirect()->route('title.index');
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  \App\Title  $title
	 * @return \Illuminate\Http\Response
	 */
	public function destroy(Title $title) {
		$title->state = ($title->state) ? 0 : 1;
		$title->save();
		return redirect()->route('title.index');
	}
}
