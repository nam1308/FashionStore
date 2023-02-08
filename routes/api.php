<?php

<<<<<<< HEAD
use App\Http\Controllers\Admin\ProductCategoryController;
use App\Http\Controllers\Admin\SettingController;
=======
use App\Http\Controllers\Admin\AuthController;
use App\Http\Controllers\Api\SettingController;
use Illuminate\Http\Request;
>>>>>>> main
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\UploadController;

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

    Route::group(['prefix' => 'media'], function () {
        Route::post('getImagePath', [UploadController::class, 'getImagePath']);
        Route::post('deleteImage', [UploadController::class, 'deleteImage']);
    });

    Route::group(['prefix' => 'setting'], function () {
        Route::post('save', [SettingController::class, 'save']);
        Route::get('', [SettingController::class, 'index']);
        Route::get('menu', [SettingController::class, 'menu']);
    });
});
