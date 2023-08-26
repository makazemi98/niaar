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

Route::prefix('shipping')->namespace('Admin')->group(function () {
    Route::group(['middleware' => ['role:manager|team-leader']], function () {
        Route::get('/', [ShippingController::class, 'index'])->name('shipping.list');
        Route::get('/q/{shipping}', [ShippingController::class, 'edit'])->name('shipping.edit');
        Route::get('/create', [ShippingController::class, 'create'])->name('shipping.create');
        Route::post('/store', [ShippingController::class, 'store'])->name('shipping.store');
        Route::post('/update/{shipping}', [ShippingController::class, 'update'])->name('shipping.update');
        Route::post('/add-comment/{shipping}', [ShippingController::class, 'addComment'])->name('shipping.add.comment');
        Route::post('/add-box/{shipping}', [BoxController::class, 'store'])->name('shipping.add.box');
    });
});
