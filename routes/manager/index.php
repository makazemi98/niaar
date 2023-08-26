<?php

use App\Http\Controllers\manager\ManagerController;
use App\Http\Controllers\Shipping\ShippingController;
use App\Http\Controllers\User\UserController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Manager Routes
|--------------------------------------------------------------------------
*/

$ROLE = 'manager';

Route::prefix($ROLE)->namespace('Manager')->group(function () {

    Route::prefix('dashboard')->group(function () {
        Route::get('/charts', [ManagerController::class, 'charts'])->name('manager.charts');
        Route::get('/clients-status', [ManagerController::class, 'clientsStatus'])->name('manager.clients.status');
        Route::get('/response-time', [UserController::class, 'getAverageResponseTimeByRole'])->name('manager.response.time');
        Route::get('/reminders', [ManagerController::class, 'reminders'])->name('manager.reminders');
        Route::get('/procurements-activities', [ManagerController::class, 'procurementsActivities'])->name('manager.procurements.activities');
        Route::get('/inquiries-statistics', [ManagerController::class, 'inquiriesStatistics'])->name('manager.inquiries.statistics');
    });

});
