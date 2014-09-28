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


    Route::get('telephones/telephone/{id}', 'TelephoneController@edit');
    Route::post('telephones/telephone/update/{id}', ['uses' => 'TelephoneController@update', 'as'=>'telephone.update']);
// Route::get('telephones/telephone/{id}', array('before' => 'auth', function(){
// }));

Route::get('/{id}',array ('uses'=>'HomeController@search'));
Route::get('/','HomeController@index');

Route::get('equipe/{id?}',array ('uses'=>'HomeController@equipe'));

Route::controller('users/login','UserController');
Route::get('users/logout',function(){
    Auth::logout();
        return Redirect::to('/');
});

Route::controller('compte/dashboard','DashboardController');

