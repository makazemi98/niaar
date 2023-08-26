<?php

use App\Http\Controllers\Auth\SocialiteController;
use App\Http\Controllers\DashboardController;
use Illuminate\Support\Facades\Route;

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

Route::get('/', [DashboardController::class, 'index'])->middleware(['auth', 'verified']);


Route::get('/error', function () {
    abort(404);
});

Route::get('/auth/redirect/{provider}', [SocialiteController::class, 'redirect']);

require __DIR__ . '/auth.php';

Route::middleware(['web', 'auth:sanctum', 'verified'])->group(function () {
    require __DIR__ . '/inquries/index.php';
});

Route::middleware(['web', 'auth:sanctum', 'verified'])->group(function () {
    require __DIR__ . '/manager/index.php';
});

Route::middleware(['web', 'auth:sanctum', 'verified'])->group(function () {
    require __DIR__ . '/users-control.php';
});

Route::middleware(['web', 'auth:sanctum', 'verified'])->group(function () {
    require __DIR__ . '/admin/index.php';
});

Route::middleware(['web', 'auth:sanctum', 'verified'])->group(function () {
    require __DIR__ . '/shipping/index.php';
});

Route::middleware(['web', 'auth:sanctum', 'verified'])->group(function () {
    require __DIR__ . '/accounting/index.php';
});
Route::fallback(function () {
    abort(404);
});
