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
use \Modules\UserModule\Http\Actions\AddFollowAction;
/**
 * Admin Route
*/
Route::middleware(['auth'])->group(function () {
    Route::resource('users', 'UserModuleController');
    Route::prefix('users')->group(function() {
        Route::get('get/{role}','UserModuleController@getUsersByRole')->name('users.role');
        Route::get('/activation/{id}','UserModuleController@activate');
        Route::get('/delete/{id}','UserModuleController@destroy');
    });
});

/**
 * Website Route
 */
Route::middleware(['auth'])->group(function () {
    Route::prefix('followers')->group(function() {
        //Route::get('add/{name}', [AddFollowAction::class , 'handle'])->name('user.add.follower');
    });
});

