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
use Modules\UserModule\Http\Controllers\UserCompanyController;
use Modules\UserModule\Http\Controllers\UserController;
use Modules\UserModule\Http\Controllers\UserSettingController;
use Modules\UserModule\Http\Controllers\UserOfferController;
use Modules\UserModule\Http\Controllers\UserSuggestionController;
use Modules\UserModule\Http\Livewire\UserSocialMediaAccounts;
use \Modules\UserModule\Http\Controllers\UpgradeController;

/**
 * Dashboard Route
*/
Route::middleware(['auth'])->group(function () {
    Route::resource('users', 'UserController');

    Route::prefix('users')->group(function() {
        Route::get('get/{role}','UserController@getUsersByRole')->name('users.role');
        Route::get('/activation/{id}','UserController@activate');
        Route::get('/delete/{id}','UserController@destroy');
    });

    Route::get('notifications-templates', function(){
        return view('usermodule::dashboard.notificationsTemplate.index');
    })->name('notifications.templates');


    Route::prefix('upgrades')->group(function() {
        Route::get('/', [UpgradeController::class , 'index'])->name('users.upgrades');
    });

});

/**
 * Website Route
 */
Route::middleware(['auth'])->group(function () {

    Route::prefix('profile')->group(function() {
        Route::get('/{name}', [UserController::class , 'getUserProfile'])->name('user.profile');

    });

    Route::prefix('followers')->group(function() {
        //Route::get('add/{name}', [AddFollowAction::class , 'handle'])->name('user.add.follower');
    });

    Route::prefix('account-settings')->group(function() {
        Route::get('social-media-accounts/{name}', [UserController::class , 'getUserSocialMediaAccounts'])->name('user.social.media.accounts');
    });

    Route::prefix('upgrade')->group(function() {
        Route::post('store', [UpgradeController::class , 'upgrade'])->name('user.upgrade');
    });

    Route::prefix('suggestions')->group(function() {
        Route::get('/', [UserSuggestionController::class , 'index'])->name('user.suggestions');
    });

    Route::prefix('company-address')->group(function() {
        Route::get('/{name}', [UserCompanyController::class , 'getUserCompanyAddress'])->name('user.company.address');
    });


    Route::prefix('user')->group(function() {
        Route::get('/{name}', [UserSettingController::class , 'edit'])->name('edit.profile');
        Route::post('edit-logo', [UserSettingController::class , 'editLogo'])->name('edit.logo');
        Route::post('edit-image', [UserSettingController::class , 'editImage'])->name('edit.image');
    });

    Route::prefix('offer')->group(function() {
        Route::get('/', [UserOfferController::class , 'index'])->name('user.offer');
        Route::get('/show', [UserOfferController::class , 'show'])->name('offer.show');

    });
});
