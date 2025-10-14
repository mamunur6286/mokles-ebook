<?php

use App\Http\Controllers\AppController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\PageController;
use App\Http\Controllers\BookController;
use Illuminate\Support\Facades\Route;





Route::get('admin/{any}', function () {
    return view('layouts.admin');
})->where('any', '^(?!api).*$');


Route::get('/', [HomeController::class, 'index']);
Route::get('/books', [BookController::class, 'index']);
Route::get('/authors', [PageController::class, 'authors']);
Route::get('/categories', [PageController::class, 'categories']);
Route::get('/books/details/{book}', [BookController::class, 'show']);
Route::get('/books/readers/{book}', [BookController::class, 'show']);
Route::get('/about', [PageController::class, 'about']);
Route::get('/contact', [PageController::class, 'contact']);
Route::get('/terms-conditions', [PageController::class, 'termsCondition']);
Route::get('/privacy-policy', [PageController::class, 'privacyPolicy']);
