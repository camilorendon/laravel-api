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
    return view('home');
});

Auth::routes();

Route::group(['prefix' => '/pokemon', 'as' => 'pokemons.' ,'middleware' => 'auth' , 'controller' => \App\Http\Controllers\Pokemons\PokemonController::class], function(){
    Route::get('/show', 'showPokemon')->name('show');
});

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

