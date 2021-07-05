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

use Illuminate\Support\Facades\Route;


Route::resource('users', 'UserModuleController');
Route::prefix('users')->group(function() {

    Route::get('get/{role}','UserModuleController@getUsersByRole')->name('users.role');
    Route::get('/activation/{id}','UserModuleController@activate');
    Route::get('/delete/{id}','UserModuleController@destroy');

});

