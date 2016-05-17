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


//Rute koje se aktivno koriste u projektu
//Home route
Route::get('/', function()
{
	return View::make('home');
});

//Dodao Andrija
Route::resource('kandidat', 'KandidatController');



Route::get('/tipStudija', 'TipStudijaController@index');
Route::get('/studijskiProgram', 'StudijskiProgramController@index');
Route::get('/godinaStudija', 'GodinaStudijaController@index');
Route::get('/sport', 'SportController@index');

//Dodao Andrija rute za testiranje
Route::get('/test1', 'KandidatController@test1');
Route::get('/test2', 'KandidatController@test2');


//Rute koje su bile u temi, jos nisu iskoriscene za projekat
Route::get('/charts', function()
{
	return View::make('mcharts');
});

Route::get('/tables', function()
{
	return View::make('table');
});

Route::get('/forms', function()
{
	return View::make('form');
});

Route::get('/grid', function()
{
	return View::make('grid');
});

Route::get('/buttons', function()
{
	return View::make('buttons');
});


Route::get('/icons', function()
{
	return View::make('icons');
});

Route::get('/panels', function()
{
	return View::make('panel');
});

Route::get('/typography', function()
{
	return View::make('typography');
});

Route::get('/notifications', function()
{
	return View::make('notifications');
});

Route::get('/blank', function()
{
	return View::make('blank');
});

Route::get('/login', function()
{
	return View::make('login');
});

Route::get('/documentation', function()
{
	return View::make('documentation');
});