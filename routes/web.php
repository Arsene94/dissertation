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

Route::get('/', 'HomeController@index')->name('home.welcome');

Route::view('/aboutus', 'home.aboutus')->name('home.aboutus');

Route::view('/faq', 'home.faq')->name('home.faq');

Route::view('/doc', 'home.documentation')->name('doc.documentation');

Route::view('/contact', 'home.contact')->name('home.contact');

Auth::routes(['verify' => true]);

Route::get('/home', 'HomeController@index')->name('event.index');
Route::post('/home', 'HomeController@eventCreate')->name('event.create');

Route::get('/event/{id}/', 'EventController@eventHome');
Route::get('/event/{id}/polls', 'EventController@eventHome')->name('poll.home');
Route::post('/event/{id}/polls/{polltype}', 'EventController@pollCreate')->name('poll.create');

Route::post('/event/{id}/polls/{pollID}/{survid}', 'EventController@surveyCreate')->name('poll.survey');

Route::get('/event/{id}/delete', 'EventController@getDeleteEvent')->name('event.delete');
Route::get('/event/{id}/poll/{pollid}/delete', 'EventController@getDeletePoll')->name('poll.delete');

Route::get('/event/{id}/fetch_data_events', 'EventController@fetch_events')->name('fetch.events');
Route::get('/event/{id}/poll/fetch_data_polls', 'EventController@fetch_polls')->name('fetch.polls');

Route::get('/event/{evID}/polls/{id}/updateLiveAns', 'EventController@liveAnswers')->name('update.LiveAnswer');

Route::get('/event/{evID}/polls/{id}/startPoll', 'EventController@startPoll')->name('poll.start');

Route::post('/event/createTeam', 'HomeController@createTeams')->name('events.createTeams');