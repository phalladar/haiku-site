<?php 

class SessionsController extends BaseController {

	public function create() {

		if (Auth::check()) return Redirect::to('/');
		return View::make('sessions.create');
	}

	public function store() {
		if (Auth::attempt(Input::only('email', 'password')))
		{
			return Redirect::to('/');
		}

		return 'Failed!';
	}

	public function destroy() {
		Auth::logout();
		return Redirect::to('/h-login');
	}
}