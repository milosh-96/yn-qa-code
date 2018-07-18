<?php

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
    return view('public.home.index');
})->name('index');

Route::prefix('auth')->group(function() {
    Route::post('login','Auth\LoginController@login')->name('auth.login');
    Route::post('register','Auth\RegisterController@register')->name('auth.register');
    Route::get('logout','Auth\LoginController@logout')->name('auth.logout');
});

Route::prefix('questions')->group(function() {
    Route::post('/','QuestionController@store')->name('questions.store');
});
