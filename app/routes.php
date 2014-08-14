<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the Closure to execute when that URI is requested.
|
*/

Route::get('/', function()
{
	$name = 'Joshua';
	return View::make('hello')->with('name', $name);
});

Route::get('/haiku', function(){

	$result = DB::table('haiku')->orderBy(DB::raw('RAND()'))->where('reviewed', '1')->first();
	if ($result->id == '31337')
	{
		$result = DB::table('haiku')->orderBy(DB::raw('RAND()'))->first();
	}

	$year = date("Y", strtotime($result->opinion_date));
	$voted = Session::get($result->id, 'none');
	return View::make('haiku')->with('line1', $result->line1)->with('line2', $result->line2)->with('line3', $result->line3)->with('shortname', $result->shortname)->with('id', $result->id)->with('year', $year)->with('voted', $voted);

});

Route::get('/test', function(){
	$haiku = Haiku::find(13892);
	$haiku->score = $haiku->score + 1;
	$haiku->save();
	var_dump($haiku->score);

});

Route::get('/haiku/{id}', function($id){
	
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

Route::post('/haiku/up', array('as' => 'haiku.up', function()
{

	if (Session::get(Input::get('id')) == 'up') {
		return Redirect::to('/haiku');
	}
	elseif (Session::get(Input::get('id')) == 'down') {
		Session::put(Input::get('id'), 'up');
		Haiku::find(Input::get('id'))->increment('score');
		Haiku::find(Input::get('id'))->increment('score');
	    return Redirect::to('/haiku');
	}
	else {
		Session::put(Input::get('id'), 'up');
		Haiku::find(Input::get('id'))->increment('score');
	    return Redirect::to('/haiku');
	}

}));

Route::post('/haiku/down', array('as' => 'haiku.down', function()
{
	if (Session::get(Input::get('id')) == 'down') {
		return Redirect::to('/haiku');
	}
	elseif (Session::get(Input::get('id')) == 'up') {
		Session::put(Input::get('id'), 'down');
		Haiku::find(Input::get('id'))->decrement('score');
		Haiku::find(Input::get('id'))->decrement('score');
	    return Redirect::to('/haiku');
	}
	else {
		Session::put(Input::get('id'), 'down');
		Haiku::find(Input::get('id'))->decrement('score');
	    return Redirect::to('/haiku');
	}

}));

Route::post('/haiku/remove', array('as' => 'haiku.remove', function()
{
	Haiku::find(Input::get('id'))->delete();
	return Redirect::to('/haiku');
}));