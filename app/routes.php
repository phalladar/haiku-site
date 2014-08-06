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

	return View::make('haiku');

});