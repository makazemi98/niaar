<?php

use App\Http\Controllers\User\UserController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Manager Routes
|--------------------------------------------------------------------------
*/


Route::namespace('User')->group(function () {

    Route::prefix('team-members')->group(function () {
        Route::get('/', [UserController::class, 'getTeamMembers'])->name('manager.team.members');
        Route::get('/create', [UserController::class, 'createTeamMembers'])->name('manager.team.members.create');
        Route::post('/store', [UserController::class, 'store'])->name('manager.team.members.store');
    });

    Route::prefix('clients')->group(function () {
        Route::get('/', [UserController::class, 'getClient'])->name('manager.clients');
        Route::get('/create', [UserController::class, 'createClients'])->name('manager.clients.create');
        Route::post('/store', [UserController::class, 'storeCustomer'])->name('manager.clients.store');
    });


    Route::prefix('profile')->group(function () {
        Route::get('/u/{user}', [UserController::class, 'profile'])->name('manager.profile');
        Route::get('/edit/{user}', [UserController::class, 'editProfile'])->name('manager.profile.edit')->middleware('CheckRole:manager,team-lead');;

        // Route::group(['middleware' => ['role:manager|team-leader']], function () {
        Route::post('/update/{user}', [UserController::class, 'update'])->name('manager.profile.update')->middleware('CheckRole:manager,team-lead');
        // });
    });
});
