<?php

use App\Http\Controllers\Admin\SupplierController;
use App\Http\Controllers\Shipping\BoxController;
use App\Http\Controllers\Shipping\ShippingController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Manager Routes
|--------------------------------------------------------------------------
*/

Route::prefix('admin')->namespace('Admin')->group(function () {

    Route::group(['middleware' => ['role:manager|team-leader|accountant|procurement']], function () {
        Route::prefix('supplier')->group(function () {
            Route::get('/', [SupplierController::class, 'list'])->name('admin.supplier.list');
            Route::get('/create', [SupplierController::class, 'create'])->name('admin.supplier.create');
            Route::post('/store', [SupplierController::class, 'store'])->name('admin.supplier.store');
        });

    });
});
