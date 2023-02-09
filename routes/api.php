<?php

use App\Http\Controllers\Admin\AuthController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\UploadController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\BlogController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/
Route::post('login', [AuthController::class, 'login']);

Route::middleware('auth:api')->group(function () {
    Route::post('register', [AuthController::class, 'register']);

    Route::group(['prefix' => 'media'], function (){
        Route::post('getImagePath', [UploadController::class, 'getImagePath']);
        Route::post('deleteImage', [UploadController::class, 'deleteImage']);
    });

    Route::group(['as' => 'blog'], function (){
        Route::post('blog/search/', [BlogController::class, 'search'])->name('search');
        Route::get('blog/{blog}', [BlogController::class, 'show'])->name('show');
        Route::post('blog', [BlogController::class, 'store'])->name('store');
        Route::put('blog/{blog}', [BlogController::class, 'update'])->name('update');
        Route::delete('blog/{blog}', [BlogController::class, 'delete'])->name('delete');
        Route::get('admin/blog/{id}/edit', [BlogController::class, 'edit'])->name('edit');
        Route::get('blog', [BlogController::class, 'list'])->name('index');
    });
});
