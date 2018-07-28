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

Route::get('/','MainController@home')->name('index');

Route::prefix('auth')->group(function() {
    Route::post('login','Auth\LoginController@login')->name('auth.login');
    Route::post('register','Auth\RegisterController@register')->name('auth.register');
    Route::get('logout','Auth\LoginController@logout')->name('auth.logout');
});


Route::prefix('question')->group(function() {
    Route::get('{hash}/{slug}','QuestionController@show')->name('question.show');
    Route::delete('{hash}','QuestionController@destroy')->name('question.destroy');
});

Route::prefix('questions')->group(function() {
    Route::post('/','QuestionController@store')->name('questions.store');
    Route::get('/edit/{hash}','QuestionController@edit')->name('question.edit');//used only as a url to get modal html from ajax request //
    Route::post('/update/{hash}','QuestionController@update')->name('question.update');

    Route::prefix('question')->group(function() {
        Route::prefix('{hash}')->group(function() {
            Route::post('/answerQuestion','QuestionController@answerQuestionApi')->name('question.answer');
        });
    });
});
