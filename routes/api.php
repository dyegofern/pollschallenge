<?php

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::get('/poll/{poll}', 'Api\PollController@get')->name('poll.get');
Route::get('/poll/{poll}/stats', 'Api\PollController@stats')->name('poll.stats');
Route::post('/poll/{poll}/vote', 'Api\PollController@vote')->name('poll.vote');
Route::post('/poll', 'Api\PollController@store')->name('poll.store');
