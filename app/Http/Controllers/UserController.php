<?php

namespace App\Http\Controllers;

use App\Permission;
use App\User;
use Illuminate\Http\Request;

class UserController extends Controller {
	/**
	 * Create a new controller instance.
	 *
	 * @return void
	 */
	public function __construct() {
		$this->middleware('auth');
	}
	/**
	 * Display a listing of the resource.
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function index() {

		return view('auth.controlPanel.user.index')->with('users', User::paginate(15));
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function create() {
		//
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
	 * @param  int  $id
	 * @return \Illuminate\Http\Response
	 */
	public function show($id) {
		return view('auth.controlPanel.user.show')
			->with('permissions', Permission::where('user_id', $id)->get())
			->with('user', User::find($id));

	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return \Illuminate\Http\Response
	 */
	public function edit($id) {

		return view('auth.controlPanel.user.edit')->with('user', User::find($id));

	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  \Illuminate\Http\Request  $request
	 * @param  int  $id
	 * @return \Illuminate\Http\Response
	 */
	public function update(Request $request, $id) {

		$user = User::find($id);
		$validator = $this->validate($request, [
			'name' => 'required|max:255',
			'email' => 'required|email|unique:users,email,' . $user->id,
			'password' => 'min:6|confirmed',
		]);
		$oldPassword = $user->password;
		// exit(var_dump($request->input('password', 'calve anterior')));
		$user->update($request->all());

		if ($request->input('password', 'calve anterior') === '') {
			$user->password = $oldPassword;
			$user->save();

		} else {
			$user->password = bcrypt($request->input('password', 'calve anterior'));
			$user->save();
		}
		\Alert::success(trans('alerts.success'));
		return redirect()->route('user.show', ['id' => $id]);

	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return \Illuminate\Http\Response
	 */
	public function destroy($id) {
		\Alert::success(trans('alerts.success'));
		//User::destroy($id);
		$userAfect = User::find($id);
		// return (var_dump($userAfect->state));
		$userAfect->state = ($userAfect->state) ? 0 : 1;
		$userAfect->save();
		return redirect()->route('user.index');

		// return view('auth.controlPanel.user.index')->with('users', User::paginate(15));

	}
}
