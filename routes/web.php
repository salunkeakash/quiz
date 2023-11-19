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
    return view('home',['title' => 'home']);
});

Route::get('/choose-you-game', function () {
    return view('choose_game' ,['title' => 'Choose Your Game']);
});

Route::get('/sector/{id}', function ($id) {
    session()->put('gameflow', $id);
    return view('sector',['title' => 'Sector']);
});

Route::get('/details_form/{id}', function ($id) {
    session()->put('sector', $id);
    return view('details_form',['title' => 'Fill Your Details']);
});



Route::post('/startquiz', 'QuizController@create');
Route::get('/quiz', 'QuizController@index');
Route::post('/submitquize', 'QuizController@update');

Route::get('/result', 'QuizController@show');
