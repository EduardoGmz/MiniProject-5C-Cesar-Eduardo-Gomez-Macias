<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

//Movies

Route::get('/movies', 'MoviesController@MoviesStore')->name('MoviesStore');

Route::get('/movies/{id}', 'MoviesController@Details')->name('MoviesDetails');

Route::post('/movies/comment', 'MoviesController@AddComment')->name('MoviesComments');

//Admin.Movies

Route::get('/admin/movies', 'MoviesController@Index');

Route::get('/admin/movies/create', "MoviesController@Create");

Route::post('/admin/movies/create', "MoviesController@Store");

Route::get('/admin/movies/delete/{id}', "MoviesController@Delete");

Route::get('/admin/movies/edit/{id}', "MoviesController@Edit");

Route::get('/admin/movies/{id}', "MoviesController@Show");

Route::post('/admin/movies/edit', "MoviesController@Update");

Route::delete('/admin/movies/delete', "MoviesController@Remove");


// Music

Route::get('/music', 'MusicController@MusicStore')->name('MusicStore');

Route::get('/music/{id}', 'MusicController@Details')->name('MusicDetails');

Route::post('/music/comment', 'MusicController@AddComment')->name('MusicComments');

// Admin.Music

Route::get('/admin/music', 'MusicController@Index');

Route::get('/admin/music/create', "MusicController@Create");

Route::post('/admin/music/create', "MusicController@Store");

Route::get('/admin/music/delete/{id}', "MusicController@Delete");

Route::get('/admin/music/edit/{id}', "MusicController@Edit");

Route::get('/admin/music/{id}', "MusicController@Show");

Route::post('/admin/music/edit', "MusicController@Update");

Route::delete('/admin/music/delete', "MusicController@Remove");


// VideoGames

Route::get('/videogames', 'VideoGamesController@VideoGamesStore')->name('VideoGamesStore');

Route::get('/videogames/{id}', 'VideoGamesController@Details')->name('VideoGamesDetails');

Route::post('/videogames/comment', 'VideoGamesController@AddComment')->name('VideoGamesComments');

// Admin.VideoGames

Route::get('/admin/videogames', 'VideoGamesController@Index');

Route::get('/admin/videogames/create', "VideoGamesController@Create");

Route::post('/admin/videogames/create', "VideoGamesController@Store");

Route::get('/admin/videogames/delete/{id}', "VideoGamesController@Delete");

Route::get('/admin/videogames/edit/{id}', "VideoGamesController@Edit");

Route::get('/admin/videogames/{id}', "VideoGamesController@Show");

Route::post('/admin/videogames/edit', "VideoGamesController@Update");

Route::delete('/admin/videogames/delete', "VideoGamesController@Remove");


Route::get('/mongodb', function () {
    return view('mongodb');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

