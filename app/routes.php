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

Route::get('/db', function(){

	//$randomID = DB::table('haiku')->max('id'); // returns the MAX ID
	//$IDs = DB::table('haiku')->lists('id'); // return array of IDs
	//$result = DB::table('haiku')->where('id', $randomID)->first(); // return where ID = $randomID
	$result = DB::table('haiku')->orderBy(DB::raw('RAND()'))->first();
	
	return '<p align="center"><font size="17" face="Palatino"><big><strong><br /><br />' . $result->line1 . '<br />' . $result->line2 . '<br />' . $result->line3 . '<br /><br /></strong><i>' . $result->shortname . '</big></i></p>';
	
	// dd($IDs[1]);

});

Route::get('/haiku', function(){

	$result = DB::table('haiku')->orderBy(DB::raw('RAND()'))->where('reviewed', '1')->first();
	if ($result->id == '31337')
	{
		$result = DB::table('haiku')->orderBy(DB::raw('RAND()'))->first();
	}
	return View::make('haiku')->with('line1', $result->line1)->with('line2', $result->line2)->with('line3', $result->line3)->with('shortname', $result->shortname)->with('id', $result->id);

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
		return View::make('haiku')->with('line1', $result->line1)->with('line2', $result->line2)->with('line3', $result->line3)->with('shortname', $result->shortname)->with('id', $result->id);
	}
	else
	{
		$result = Haiku::find(31337);
		return View::make('haiku')->with('line1', $result->line1)->with('line2', $result->line2)->with('line3', $result->line3)->with('shortname', $result->shortname)->with('id', $result->id);
	}
	#

});

Route::post('/haiku/up', array('as' => 'haiku.up', function()
{

/*	$haiku = Haiku::find(Input::get('id'));
	$haiku->score = $haiku->score + 1;
	$haiku->save();*/
	Haiku::find(Input::get('id'))->increment('score');
    return Redirect::to('/haiku');

}));

Route::post('/haiku/down', array('as' => 'haiku.down', function()
{

	$haiku = Haiku::find(Input::get('id'));
	$haiku->score = $haiku->score - 1;
	$haiku->save();
	return Redirect::to('/haiku');
}));

Route::post('/haiku/remove', array('as' => 'haiku.remove', function()
{

	Haiku::find(Input::get('id'))->delete();
	return Redirect::to('/haiku');
}));