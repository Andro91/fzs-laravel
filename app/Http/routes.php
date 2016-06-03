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

//Added by Andrija
//Routes in the web middleware group

Route::group(['middleware' => ['web']], function () {

	Route::auth();
	Route::resource('kandidat', 'KandidatController');

});



// rute za sifarnike
Route::get('/tipStudija', 'TipStudijaController@index');
Route::get('/studijskiProgram', 'StudijskiProgramController@index');
Route::get('/godinaStudija', 'GodinaStudijaController@index');
Route::get('/sport', 'SportController@index');
Route::get('/sportskoAngazovanje', 'SportskoAngazovanjeController@index');
Route::get('/statusStudiranja', 'StatusStudiranjaController@index');
Route::get('/predmet', 'PredmetController@index');
Route::get('/srednjeSkoleFakulteti', 'SrednjeSkoleFakultetiController@index');
Route::get('/krsnaSlava', 'KrsnaSlavaController@index');
Route::get('/region', 'RegionController@index');
Route::get('/opstina', 'OpstinaController@index');
Route::get('/mesto', 'MestoController@index');

Route::post('/tipStudija/unos', 'TipStudijaController@unos');
Route::post('/studijskiProgram/unos', 'StudijskiProgramController@unos');
Route::post('/godinaStudija/unos', 'GodinaStudijaController@unos');
Route::post('/sport/unos', 'SportController@unos');
Route::post('/srednjeSkoleFakulteti/unos', 'SrednjeSkoleFakultetiController@unos');
Route::post('/krsnaSlava/unos', 'KrsnaSlavaController@unos');
Route::post('/region/unos', 'RegionController@unos');
Route::post('/opstina/unos', 'OpstinaController@unos');
Route::post('/mesto/unos', 'MestoController@unos');
Route::post('/statusStudiranja/unos', 'StatusStudiranjaController@unos');
Route::post('/predmet/unos', 'PredmetController@unos');

Route::get('/sport/{sport}/edit', 'SportController@edit');
Route::patch('sport/{sport}', 'SportController@update');
Route::get('sport/{sport}/delete', 'SportController@delete');

Route::get('/tipStudija/{tipStudija}/edit', 'TipStudijaController@edit');
Route::patch('tipStudija/{tipStudija}', 'TipStudijaController@update');
Route::get('tipStudija/{tipStudija}/delete', 'TipStudijaController@delete');

Route::get('/studijskiProgram/{studijskiProgram}/edit', 'StudijskiProgramController@edit');
Route::patch('studijskiProgram/{studijskiProgram}', 'StudijskiProgramController@update');
Route::get('studijskiProgram/{studijskiProgram}/delete', 'StudijskiProgramController@delete');

Route::get('/godinaStudija/{godinaStudija}/edit', 'GodinaStudijaController@edit');
Route::patch('godinaStudija/{godinaStudija}', 'GodinaStudijaController@update');
Route::get('godinaStudija/{godinaStudija}/delete', 'GodinaStudijaController@delete');

Route::get('/statusStudiranja/{statusStudiranja}/edit', 'StatusStudiranjaController@edit');
Route::patch('statusStudiranja/{statusStudiranja}', 'StatusStudiranjaController@update');
Route::get('statusStudiranja/{statusStudiranja}/delete', 'StatusStudiranjaController@delete');


//Dodao Andrija rute za testiranje
Route::get('/test1', 'KandidatController@test1');
Route::get('/test2', 'KandidatController@test2');

Route::post('/testPost', 'KandidatController@testPost');

Route::get('/home', 'HomeController@index');
