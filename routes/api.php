<?php

use App\Http\Controllers\Admin\AuthController;
use Illuminate\Http\Request;
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

    Route::group(['prefix' => 'media'], function (){
        Route::post('getImagePath', [UploadController::class, 'getImagePath']);
        Route::post('deleteImage', [UploadController::class, 'deleteImage']);
    });
});
