<?php

use App\Http\Controllers\BookmarkController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\CategoryController;

Route::get('/', function () {
    return view('welcome');
});

// Route::get('/bookmarks', [BookmarkController::class, 'index'])->name('bookmarks.index');
// Route::get('/bookmarks/new', [BookmarkController::class, 'create'])->name('bookmarks.new');
// Route::post('/bookmarks/store', [BookmarkController::class, 'store'])->name('bookmarks.store');
Route::resource('bookmarks', BookmarkController::class)->middleware('auth');
Route::resource('categories', CategoryController::class)->middleware('auth');
// Route::get('/login', [AuthController::class, 'showLoginForm'])->name('auth.showLoginForm');
// Route::post('/login', [AuthController::class, 'login'])->name('auth.login');
Route::get('/logout', [AuthController::class, 'logout'])->name('auth.logout')->middleware('auth');
Route::group(['middleware' => 'guest'], function () {
    Route::get('/register', [AuthController::class, 'showRegistrationForm'])->name('auth.showRegistrationForm');
    Route::post('/register', [AuthController::class, 'register'])->name('auth.register');
    Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login');
    Route::post('/login', [AuthController::class, 'login'])->name('auth.login');
});
Route::post('/filter-bookmarks', [BookmarkController::class, 'filterByCategory'])->name('bookmarks.filter')->middleware('auth');
