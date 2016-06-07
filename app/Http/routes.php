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
Route::get('/', 'HomeController@index');

//Added by Andrija
//Routes in the web middleware group

Route::group(['middleware' => ['web']], function () {

    Route::auth();
    Route::resource('kandidat', 'KandidatController');
    Route::get('/kandidat/{id}/sportskoangazovanje', 'KandidatController@sport');
    Route::post('/kandidat/{id}/sportskoangazovanje', 'KandidatController@sportStore');

    Route::get('/master/create', 'KandidatController@createMaster');
    Route::get('/master/', 'KandidatController@indexMaster');
    Route::post('/storeMaster/', 'KandidatController@storeMaster');
});


// rute za sifarnike
Route::get('/tipStudija', 'TipStudijaController@index');
Route::get('/studijskiProgram', 'StudijskiProgramController@index');
Route::get('/godinaStudija', 'GodinaStudijaController@index');
Route::get('/sport', 'SportController@index');
Route::get('/sportskoAngazovanje/{kandidat}', 'SportskoAngazovanjeController@index');
Route::get('/statusStudiranja', 'StatusStudiranjaController@index');
Route::get('/predmet', 'PredmetController@index');
Route::get('/srednjeSkoleFakulteti', 'SrednjeSkoleFakultetiController@index');
Route::get('/krsnaSlava', 'KrsnaSlavaController@index');
Route::get('/region', 'RegionController@index');
Route::get('/opstina', 'OpstinaController@index');
Route::get('/mesto', 'MestoController@index');
Route::get('/prilozenaDokumenta', 'PrilozenaDokumentaController@index');

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
Route::post('/prilozenaDokumenta/unos', 'PrilozenaDokumentaController@unos');
Route::post('/sportskoAngazovanje/unos', 'SportskoAngazovanjeController@unos');

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

Route::get('/predmet/{predmet}/edit', 'PredmetController@edit');
Route::patch('predmet/{predmet}', 'PredmetController@update');
Route::get('predmet/{predmet}/delete', 'PredmetController@delete');

Route::get('/krsnaSlava/{krsnaSlava}/edit', 'KrsnaSlavaController@edit');
Route::patch('krsnaSlava/{krsnaSlava}', 'KrsnaSlavaController@update');
Route::get('krsnaSlava/{krsnaSlava}/delete', 'KrsnaSlavaController@delete');

Route::get('/region/{region}/edit', 'RegionController@edit');
Route::patch('region/{region}', 'RegionController@update');
Route::get('region/{region}/delete', 'RegionController@delete');

Route::get('/opstina/{opstina}/edit', 'OpstinaController@edit');
Route::patch('opstina/{opstina}', 'OpstinaController@update');
Route::get('opstina/{opstina}/delete', 'OpstinaController@delete');

Route::get('/mesto/{mesto}/edit', 'MestoController@edit');
Route::patch('mesto/{mesto}', 'MestoController@update');
Route::get('mesto/{mesto}/delete', 'MestoController@delete');

Route::get('/srednjeSkoleFakulteti/{srednjeSkoleFakulteti}/edit', 'SrednjeSkoleFakultetiController@edit');
Route::patch('srednjeSkoleFakulteti/{srednjeSkoleFakulteti}', 'SrednjeSkoleFakultetiController@update');
Route::get('srednjeSkoleFakulteti/{srednjeSkoleFakulteti}/delete', 'SrednjeSkoleFakultetiController@delete');

Route::get('/prilozenaDokumenta/{dokument}/edit', 'PrilozenaDokumentaController@edit');
Route::patch('prilozenaDokumenta/{dokument}', 'PrilozenaDokumentaController@update');
Route::get('prilozenaDokumenta/{dokument}/delete', 'PrilozenaDokumentaController@delete');

Route::get('/sportskoAngazovanje/{angazovanje}/edit', 'SportskoAngazovanjeController@edit');
Route::patch('sportskoAngazovanje/{angazovanje}', 'SportskoAngazovanjeController@update');
Route::get('sportskoAngazovanje/{angazovanje}/delete', 'SportskoAngazovanjeController@delete');


//Route::any('/kandidat/{kandidat}/{indikator}', 'KandidatController@update');


//Dodao Andrija rute za testiranje
Route::get('/test1', 'KandidatController@test1');
Route::get('/test2', 'KandidatController@test2');
Route::get('/test3', 'KandidatController@test3');

Route::post('/testPost', 'KandidatController@testPost');

Route::get('/home', 'HomeController@index');
