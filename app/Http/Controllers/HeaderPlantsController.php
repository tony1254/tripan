<?php

namespace App\Http\Controllers;

use App\Catalog;
use App\HeaderPlants;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class HeaderPlantsController extends Controller {
	public function validation(Request $request) {
		return $this->validate($request, [
			'name' => 'required|max:10',
			'description' => 'required|min:5|max:25',
			'number' => 'integer',
			'decimal' => 'integer',
		]);

	}
	/**
	 * Display a listing of the resource.
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function index() {
		$headerPlants = HeaderPlants::paginate(30);
		// dd($headerPlantss);
		return view('HeaderPlant.index')->with('HeaderPlants', $headerPlants);

	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function create() {
		$catalogs = Catalog::select(DB::raw('min(id) id,max(catalog_subId) as catalog_subId,max(name) as name'))->groupBy('catalog_subId')->get();
		// dd($catalogs->toArray());
		$array = [];
		foreach ($catalogs as $key => $catalog) {
			$array += [$catalog->catalog_subId => $catalog->name];
		}
		// dd($array);
		return view('HeaderPlant.create')->with('catalogs', $array);
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @param  \Illuminate\Http\Request  $request
	 * @return \Illuminate\Http\Response
	 */
	public function store(Request $request) {
		$this->validation($request);

		$HeaderPlant = new HeaderPlants;
		$HeaderPlant->name = $request->input('name');
		$HeaderPlant->description = $request->input('description');
		if ($request->input('catalog_type')) {
			$HeaderPlant->catalog_type = $request->input('catalog_type');
			$HeaderPlant->catalog_id = $request->input('catalog_id');
			$HeaderPlant->number = 0;
			$HeaderPlant->decimal = 0;
		} else {
			$HeaderPlant->catalog_type = false;
			$HeaderPlant->catalog_id = 0;
			// dd(empty($request->input('number')));
			$HeaderPlant->number = (empty($request->input('number'))) ? 0 : $request->input('number');
			$HeaderPlant->decimal = (empty($request->input('number'))) ? 0 : $request->input('decimal');
		}
		$HeaderPlant->save();
		// dd($HeaderPlant);
		return redirect()->route('HeaderPlants.index');
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  \App\HeaderPlants  $headerPlants
	 * @return \Illuminate\Http\Response
	 */
	public function show(HeaderPlants $HeaderPlant) {
		//
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  \App\HeaderPlants  $HeaderPlant
	 * @return \Illuminate\Http\Response
	 */
	public function edit(HeaderPlants $HeaderPlant) {

		$catalogs = Catalog::select(DB::raw('min(id) id,max(catalog_subId) as catalog_subId,max(name) as name'))->groupBy('catalog_subId')->get();
		// dd($catalogs->toArray());
		$array = [];
		foreach ($catalogs as $key => $catalog) {
			$array += [$catalog->catalog_subId => $catalog->name];
		}
		// dd($array);
		return view('HeaderPlant.edit')->with('HeaderPlant', $HeaderPlant)->with('catalogs', $array);

	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  \Illuminate\Http\Request  $request
	 * @param  \App\HeaderPlants  $HeaderPlant
	 * @return \Illuminate\Http\Response
	 */
	public function update(Request $request, HeaderPlants $HeaderPlant) {
		$this->validation($request);
		$HeaderPlant->name = $request->input('name');
		$HeaderPlant->description = $request->input('description');
		if ($request->input('catalog_type')) {
			$HeaderPlant->catalog_type = $request->input('catalog_type');
			$HeaderPlant->catalog_id = $request->input('catalog_id');
			$HeaderPlant->number = 0;
			$HeaderPlant->decimal = 0;
		} else {
			$HeaderPlant->catalog_type = false;
			$HeaderPlant->catalog_id = 0;
			$HeaderPlant->number = $request->input('number');
			$HeaderPlant->decimal = $request->input('decimal');
		}
		$HeaderPlant->save();
		// dd($HeaderPlant);
		return redirect()->route('HeaderPlants.index');
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  \App\HeaderPlants  $HeaderPlant
	 * @return \Illuminate\Http\Response
	 */
	public function destroy(HeaderPlants $HeaderPlant) {
		// dd($HeaderPlant);
		$HeaderPlant->state = ($HeaderPlant->state) ? 0 : 1;
		$HeaderPlant->save();
		return redirect()->route('HeaderPlants.index');

	}
}
