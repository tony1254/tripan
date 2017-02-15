<?php

namespace App\Http\Controllers;

use App\Catalog;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CatalogController extends Controller {
	/**
	 * Display a listing of the resource.
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function index() {
		// dd();

		// dd(Catalog::groupBy('catalog_subId')->get());
		// dd(DB::select("SELECT sum(id),max(catalog_subId),name FROM `catalogs` WHERE 1 GROUP by name"));
		$catalogs = Catalog::select(DB::raw('min(id) id,max(catalog_subId) as catalog_subId,max(name) as name'))->groupBy('catalog_subId')->paginate(30);
		// dd($catalogs);
		return view('catalog.index')->with('catalogs', $catalogs)->with('subId', Catalog::all()->max('catalog_subId'));

	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function create() {

		return view('catalog.create');

	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @param  \Illuminate\Http\Request  $request
	 * @return \Illuminate\Http\Response
	 */
	public function store(Request $request) {
		$this->validate($request, [
			'name' => 'required|min:3|max:23',
			'description' => 'required|min:3|max:20',
		]);
		Catalog::create([
			'catalog_subId' => $request->input('subId'),
			'name' => $request->input('name'),
			'code' => ($request->input('code')) ? $request->input('code') : 1, //si exite tomar el ultimo
			'description' => $request->input('description'),
		]);
		return redirect()->route('catalog.index');

		return ($request->all());
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  \App\Catalog  $catalog
	 * @return \Illuminate\Http\Response
	 */
	public function show(Catalog $catalog) {

		$catalog = Catalog::where('catalog_subId', $catalog->catalog_subId)->get();

		return view('catalog.show')->with('catalogs', $catalog);

	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  \App\Catalog  $catalog
	 * @return \Illuminate\Http\Response
	 */
	public function edit(Catalog $catalog) {
		return view('catalog.edit')->with('catalog', $catalog);

	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  \Illuminate\Http\Request  $request
	 * @param  \App\Catalog  $catalog
	 * @return \Illuminate\Http\Response
	 */
	public function update(Request $request, Catalog $catalog) {
		$this->validate($request, [
			'description' => 'required|min:3|max:23',
		]);
		$catalog->description = $request->input('description');
		$catalog->save();
		return redirect()->route('catalog.show', $catalog->id);
		// dd($catalog, $request->all());
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  \App\Catalog  $catalog
	 * @return \Illuminate\Http\Response
	 */
	public function destroy(Catalog $catalog) {
		Catalog::where('catalog_subId', $catalog->catalog_subId)->delete();
		return redirect()->route('catalog.index');

	}
	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  \App\Catalog  $catalog
	 * @return \Illuminate\Http\Response
	 */
	public function destroyItem(Catalog $catalog) {
		// Catalog::where('catalog_subId', $catalog->catalog_subId)->delete();
		$catalog->state = ($catalog->state) ? 0 : 1;
		$catalog->save();
		return redirect()->route('catalog.show', $catalog->id);
		return redirect()->route('catalog.index');

	}
}
