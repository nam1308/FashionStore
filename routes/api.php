<?php

use App\Http\Controllers\Admin\ProductCategoryController;
use App\Http\Controllers\Admin\AuthController;
use App\Http\Controllers\Api\AttributeController;
use App\Http\Controllers\Api\SettingController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\UploadController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\BlogController;
use App\Http\Controllers\Admin\CategoryBlogController;
use App\Http\Controllers\Api\ProductController;
use App\Http\Controllers\Api\TestimonialController;
use App\Http\Controllers\Api\BannerController;
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
        Route::get('single', [SettingController::class, 'single']);
        Route::get('', [SettingController::class, 'index']);
    });

    Route::group(['prefix' => 'products'], function () {
        Route::get('', [ProductController::class, 'list'])->name('list');
        Route::get('/{id}', [ProductController::class, 'show'])->name('show');
        Route::post('', [ProductController::class, 'create'])->name('products.create');
        Route::post('/search', [ProductController::class, 'search'])->name('search');
        Route::put('/{id}', [ProductController::class, 'update'])->name('update');
        Route::delete('/{id}', [ProductController::class, 'delete'])->name('delete');
    });

    Route::group(['as' => 'product-category.'], function () {
        Route::get('product-category', [ProductCategoryController::class, 'list'])->name('index');
        Route::get('product-category/search/', [ProductCategoryController::class, 'search'])->name('search');
        Route::get('product-category/{id}', [ProductCategoryController::class, 'show'])->name('show');
        Route::post('product-category', [ProductCategoryController::class, 'store'])->name('store');
        Route::put('product-category/{id}', [ProductCategoryController::class, 'update'])->name('update');
        Route::delete('product-category/{id}', [ProductCategoryController::class, 'destroy'])->name('destroy');
    });

    // Router Blog
    Route::group(['as' => 'blog'], function () {
        Route::get('blog', [BlogController::class, 'list'])->name('index');
        Route::get('blog/{id}', [BlogController::class, 'show'])->name('show');
        Route::post('blog', [BlogController::class, 'store'])->name('store');
        Route::post('blog/search/', [BlogController::class, 'search'])->name('search');
        Route::put('blog/{id}', [BlogController::class, 'update'])->name('update');
        Route::delete('blog/{id}', [BlogController::class, 'delete'])->name('delete');
    });

    // Router Category_blog
    Route::group(['as' => 'categoryBlog'], function () {
        Route::get('categoryBlog', [CategoryBlogController::class, 'list'])->name('list');
        Route::get('categoryBlog/{id}', [CategoryBlogController::class, 'show'])->name('show');
        Route::post('categoryBlog', [CategoryBlogController::class, 'store'])->name('store');
        Route::post('categoryBlog/search/', [CategoryBlogController::class, 'search'])->name('search');
        Route::put('categoryBlog/{id}', [CategoryBlogController::class, 'update'])->name('update');
        Route::delete('categoryBlog/{id}', [CategoryBlogController::class, 'delete'])->name('delete');
    });

    Route::group(['as' => 'attribute.', 'prefix' => 'product'], function () {
        Route::post('attribute', [AttributeController::class, 'store']);
        Route::get('attribute', [AttributeController::class, 'search'])->name('search');
        Route::get('attribute/filter', [AttributeController::class, 'filter'])->name('filter');
        Route::get('attribute/{attribute}', [AttributeController::class, 'show']);
        Route::put('attribute/{attribute}', [AttributeController::class, 'update']);
        Route::delete('attribute/{attribute}', [AttributeController::class, 'destroy']);
    });

    // Router testimonial
    Route::group(['prefix' => 'testimonial'], function (){
        Route::get('', [TestimonialController::class, 'list'])->name('list');
        Route::get('/{id}', [TestimonialController::class, 'show'])->name('show');
        Route::post('', [TestimonialController::class, 'create'])->name('create');
        Route::post('/search', [TestimonialController::class, 'search'])->name('search');
        Route::put('/{id}', [TestimonialController::class, 'update'])->name('update');
        Route::delete('/{id}', [TestimonialController::class, 'delete'])->name('delete');
    });

    // Router banner
    Route::group(['prefix' => 'banner'], function (){
        Route::get('', [BannerController::class, 'list'])->name('list');
        Route::get('/{id}', [BannerController::class, 'show'])->name('show');
        Route::post('', [BannerController::class, 'create'])->name('create');
        Route::post('/search', [BannerController::class, 'search'])->name('search');
        Route::put('/{id}', [BannerController::class, 'update'])->name('update');
        Route::delete('/{id}', [BannerController::class, 'delete'])->name('delete');
    });

});
