<?php

use App\Http\Controllers\Admin\AuthController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\ProductController;
use App\Http\Controllers\Frontend\HomeController;
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

Route::match(['POST', 'GET'], 'login', [AuthController::class, 'login'])->name('admin.login');
Route::match(['POST', 'GET'], 'reset_password', [AuthController::class, 'resetPassword'])->name('admin.resetPassword');

Route::middleware(['middleware' => 'auth'])->group(function () {
    Route::group(['prefix' => 'admin'], function () {
        Route::get('', [DashboardController::class, 'index'])->name('admin.home');
        Route::get('logout', [AuthController::class, 'logout'])->name('admin.logout');

        // Products
        Route::group(['prefix' => 'products'], function () {
            Route::get('', [ProductController::class, 'index']);
            Route::get('category', [ProductController::class, 'category']);
        });
    });
});

Route::group(['namespace' => 'Frontend'], function () {
    Route::get('', [HomeController::class, 'index']);
});
