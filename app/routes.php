<?php

Route::get('h-login', 'SessionsController@create');
Route::get('logout', 'SessionsController@destroy');

Route::resource('sessions', 'SessionsController');

Route::get('/publiclinks', function(){
	
	return View::make('publiclinks');

});

Route::get('/', function()
{
	$result = DB::table('haiku')->orderBy(DB::raw('RAND()'))->where('reviewed', '1')->first();
	if ($result->id == '31337')

	$year = date("Y", strtotime($result->opinion_date));
	$voted = Session::get($result->id, 'none');
	return View::make('haiku')->with('line1', $result->line1)->with('line2', $result->line2)->with('line3', $result->line3)->with('shortname', $result->shortname)->with('id', $result->id)->with('year', $year)->with('voted', $voted);
});

Route::get('/', function()
{
	$result = DB::table('haiku')->orderBy(DB::raw('RAND()'))->where('reviewed', '1')->first();


	$year = date("Y", strtotime($result->opinion_date));
	$voted = Session::get($result->id, 'none');
	return View::make('haiku')->with('line1', $result->line1)->with('line2', $result->line2)->with('line3', $result->line3)->with('shortname', $result->shortname)->with('id', $result->id)->with('year', $year)->with('voted', $voted);
});

Route::get('/{id}', function($id){
	
	$result = Haiku::find($id);
	#dd($result);
	if ($result != null)
	{
		$year = date("Y", strtotime($result->opinion_date));
		$voted = Session::get($id, 'none');
		return View::make('haiku')->with('line1', $result->line1)->with('line2', $result->line2)->with('line3', $result->line3)->with('shortname', $result->shortname)->with('id', $result->id)->with('year', $year)->with('voted', $voted);
	}
	else
	{
		$result = Haiku::find(31337);
		$voted = 'none';
		$year = date("Y", strtotime($result->opinion_date));
		return View::make('haiku')->with('line1', $result->line1)->with('line2', $result->line2)->with('line3', $result->line3)->with('shortname', $result->shortname)->with('id', $result->id)->with('year', $year)->with('voted', $voted);
	}
	#

});

Route::post('/up', array('as' => 'haiku.up', function()
{
	if (Session::get(Input::get('info')) != 'no') Session::put('info', 'no');
	if (Session::get(Input::get('id')) == 'up') {
		return Redirect::to('/');
	}
	elseif (Session::get(Input::get('id')) == 'down') {
		Session::put(Input::get('id'), 'up');
		Haiku::find(Input::get('id'))->increment('score');
		Haiku::find(Input::get('id'))->increment('score');
	    return Redirect::to('/');
	}
	else {
		Session::put(Input::get('id'), 'up');
		Haiku::find(Input::get('id'))->increment('score');
	    return Redirect::to('/');
	}

}));

Route::post('/down', array('as' => 'haiku.down', function()
{
	if (Session::get(Input::get('info')) != 'no') Session::put('info', 'no');
	if (Session::get(Input::get('id')) == 'down') {
		return Redirect::to('/');
	}
	elseif (Session::get(Input::get('id')) == 'up') {
		Session::put(Input::get('id'), 'down');
		Haiku::find(Input::get('id'))->decrement('score');
		Haiku::find(Input::get('id'))->decrement('score');
	    return Redirect::to('/');
	}
	else {
		Session::put(Input::get('id'), 'down');
		Haiku::find(Input::get('id'))->decrement('score');
	    return Redirect::to('/');
	}

}));

Route::post('/remove', array('as' => 'haiku.remove', function()
{
	Haiku::find(Input::get('id'))->delete();
	return Redirect::to('/');
}));

Route::post('/{id}/edit', array('as' => 'haiku.edit', function()
{

	//return Input::get('line1');
	DB::table('haiku')
		->where('id', Input::get('id'))
		->update(array('line1' => Input::get('line1'),
						'line2' => Input::get('line2'),
						'line3' => Input::get('line3'),
						'shortname' => Input::get('shortname')));

	return Redirect::to(url('/', $parameters = array(), $secure = null) . '/' . Input::get('id'));

}));

Route::post('/flag', array('as' => 'haiku.flag', function()
{
	if (Session::get(Input::get('info')) != 'no') Session::put('info', 'no');
	$theFlag = Input::get('id') . "-flag";
	if (Session::get($theFlag) == 'yes') {
		return Redirect::to('/');
	} else {
		Session::put($theFlag, 'yes');
		Haiku::find(Input::get('id'))->increment('flagged');
	    return Redirect::to('/');
	}

}));

