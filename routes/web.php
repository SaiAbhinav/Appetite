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
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::middleware(['auth'])->group(function() {       

    Route::post('/uploadproof', 'UsersController@uploadproof');

    Route::post('/updateprofile', 'UsersController@updateprofile');
    Route::put('/updateprofile', 'UsersController@updateprofile');
    Route::post('/approve', 'UsersController@approve');
    Route::post('/upgraderole', 'UsersController@upgraderole');
    Route::put('/changepassword','UsersController@changepassword');

    Route::post('/savedcard', 'WalletsController@updatefromsavedcard');
    Route::put('/savedcard', 'WalletsController@updatefromsavedcard');

    Route::post('/account-to-wallet', 'WalletsController@updatefromaccount');
    Route::put('/account-to-wallet', 'WalletsController@updatefromaccount');

    Route::post('/clear-account-history', 'WalletsController@clearacchistory');
    Route::delete('/clear-account-history', 'WalletsController@clearacchistory');

    Route::post('/clear-card-history', 'WalletsController@clearcardhistory');
    Route::delete('/clear-card-history', 'WalletsController@clearcardhistory');
    
    Route::post('/menu/breakfast', 'MenusController@breakfast');
    Route::post('/menu/lunch', 'MenusController@lunch');
    Route::post('/menu/dinner', 'MenusController@dinner');
    Route::get('/cart', 'MenusController@cart');

    Route::resource('users', 'UsersController'); 
    Route::resource('wallets', 'WalletsController'); 
    Route::resource('cards', 'CardsController'); 
    Route::resource('feedbacks', 'FeedbacksController'); 
          
});