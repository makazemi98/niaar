<?php

use App\Http\Controllers\Accounting\AccountingController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Manager Routes
|--------------------------------------------------------------------------
*/

Route::prefix('accounting')->group(function () {

    Route::group(['middleware' => ['role:manager|team-leader']], function () {
        Route::prefix('admin')->group(function () {
            Route::get('/', [AccountingController::class, 'index'])->name('admin.accounting.list');
            Route::post('/store-balance-sheet', [AccountingController::class, 'storeBalanceSheet'])->name('admin.accounting.store.balance.sheet');
            Route::post('/store-payment', [AccountingController::class, 'storePayment'])->name('admin.accounting.store.payment');
            Route::post('/store-future-dues', [AccountingController::class, 'storeFutureDues'])->name('admin.accounting.store.future.dues');
        });
    });
});
