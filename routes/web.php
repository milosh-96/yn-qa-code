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
    Route::prefix('api')->group(function() {
        Route::get('is-logged','Auth\LoginController@isLoggedIn');
    });
    Route::post('login','Auth\LoginController@login')->name('auth.login');
    Route::post('register','Auth\RegisterController@register')->name('auth.register');
    Route::get('logout','Auth\LoginController@logout')->name('auth.logout');
});


Route::prefix('question')->group(function() {
    Route::prefix('{hash}')->group(function() {
        Route::get('{slug}','QuestionController@show')->name('question.show');
        Route::delete('/','QuestionController@destroy')->name('question.destroy');
        Route::prefix('api')->group(function() {
            Route::get('comments','QuestionController@getComments')->name('api.question.comments');
        });
    });
    
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

Route::prefix('comments')->group(function() {
    Route::prefix('api')->group(function() {
        Route::post('/','CommentController@store')->name('api.comment.store');
        Route::put('/','CommentController@update')->name('api.comment.update');
    });
});


