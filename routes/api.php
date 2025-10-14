<?php

use App\Http\Controllers\Admin\Admin\DashboardController;
use App\Http\Controllers\Api\AuthController;
use App\Http\Controllers\Api\SalonApiController;
use App\Http\Controllers\Api\ServiceApiController;
use App\Http\Controllers\Api\SettingApiController;
use App\Http\Controllers\Admin\AuthorController;
use App\Http\Controllers\Admin\BookController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\DropDownApiController;
use App\Http\Controllers\Admin\LessonController;
use App\Http\Controllers\Admin\SeriesController;
use App\Http\Controllers\Admin\SettingController;
use Illuminate\Support\Facades\Route;

Route::group([
    'prefix' => '/v1',
    'namespace' => 'Api'
], function () {
    Route::post('/login', [AuthController::class, 'login']);
    Route::post('/register', [AuthController::class, 'register']);
    Route::post('/salon-register', [AuthController::class, 'salonRegister']);

    Route::group(['prefix' => 'settings','as' => 'api.settings'], function () {
        Route::get('', [SettingApiController::class, 'index']);
    });
});

Route::group([
    'prefix' => 'v1/'
], function () {
    Route::get('/common-dropdowns', [DropDownApiController::class, '__invoke'])->name('dropdowns');
});

Route::group([
    'prefix' => '/v1',
    'namespace' => 'Admin',
    'middleware' => 'api',
], function () {
        Route::group(['prefix' => 'authors', 'as' => 'api.authors'], function () {
            Route::get('/', [AuthorController::class, 'index'])->name('index');
            Route::post('/store', [AuthorController::class, 'store'])->name('store');
            Route::get('/{author}/edit', [AuthorController::class, 'edit'])->name('edit');
            Route::put('/update/{author}', [AuthorController::class, 'update'])->name('update');
            Route::put('/status/{author}', [AuthorController::class, 'changeStatus'])->name('change_status');
        });
        Route::group(['prefix' => 'categories', 'as' => 'api.categories'], function () {
            Route::get('/', [CategoryController::class, 'index'])->name('index');
            Route::post('/store', [CategoryController::class, 'store'])->name('store');
            Route::get('/{category}/edit', [CategoryController::class, 'edit'])->name('edit');
            Route::put('/update/{category}', [CategoryController::class, 'update'])->name('update');
            Route::put('/status/{category}', [CategoryController::class, 'changeStatus'])->name('change_status');
        });
        Route::group(['prefix' => 'series', 'as' => 'api.series'], function () {
            Route::get('/', [SeriesController::class, 'index'])->name('index');
            Route::post('/store', [SeriesController::class, 'store'])->name('store');
            Route::get('/{series}/edit', [SeriesController::class, 'edit'])->name('edit');
            Route::put('/update/{series}', [SeriesController::class, 'update'])->name('update');
            Route::put('/status/{series}', [SeriesController::class, 'changeStatus'])->name('change_status');
        });
        Route::group(['prefix' => 'books', 'as' => 'api.books'], function () {
            Route::get('/', [BookController::class, 'index'])->name('index');
            Route::post('/store', [BookController::class, 'store'])->name('store');
            Route::get('/{book}/edit', [BookController::class, 'edit'])->name('edit');
            Route::put('/update/{book}', [BookController::class, 'update'])->name('update');
            Route::put('/status/{book}', [BookController::class, 'changeStatus'])->name('change_status');
        });
        Route::group(['prefix' => 'lessons', 'as' => 'api.lessons'], function () {
            Route::get('/', [LessonController::class, 'index'])->name('index');
            Route::post('/store', [LessonController::class, 'store'])->name('store');
            Route::get('/{lesson}/edit', [LessonController::class, 'edit'])->name('edit');
            Route::put('/update/{lesson}', [LessonController::class, 'update'])->name('update');
            Route::put('/status/{lesson}', [LessonController::class, 'changeStatus'])->name('change_status');
        });
        Route::group(['prefix' => 'settings', 'as' => 'api.settings'], function () {
            Route::get('', [SettingController::class, 'getData'])->name(name: 'edit');
            Route::post('/store', [SettingController::class, 'store'])->name(name: 'store');
        });
});