<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::get('/', 'CRabbit@index');
Route::get('/receive', 'CRabbit@receive');

Route::get('/formsms', 'CRabbit@getFormView');
Route::post('/send1', ['as'=>'Send','uses'=>'CRabbit@postForm']);

Route::get('/index', 'OSMController@getIndexView');
Route::post('/indexPost', ['as'=>'postIndex' ,'uses'=>'OSMController@postAjax']);

/* ----- ajax -----*/
Route::get('/getChildWilayah/{id}', 'CRabbit@wilayahChild');


Route::get('/formWalkot', 'CRabbit_Walkot@getFormView');
Route::post('/sendwalkot', ['as'=>'Sendwalkot','uses'=>'CRabbit_Walkot@postForm']);

