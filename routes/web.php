<?php

use App\Http\Controllers\BookmarkController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\CategoryController;

Route::get('/', function () {
    return view('welcome');
});

// Resource routes for bookmarks and categories with authentication middleware
Route::resource('bookmarks', BookmarkController::class)->middleware('auth');
Route::resource('categories', CategoryController::class)->middleware('auth');
Route::post('/filter-bookmarks', [BookmarkController::class, 'filterByCategory'])
    ->name('bookmarks.filter')
    ->middleware('auth');

// Authentication routes
Route::get('/logout', [AuthController::class, 'logout'])
    ->name('auth.logout')
    ->middleware('auth');

Route::get('/change-password', [AuthController::class, 'showChangePasswordForm'])
    ->name('auth.showChangePasswordForm')
    ->middleware('auth');

Route::post('/change-password', [AuthController::class, 'changePassword'])
    ->name('auth.changePassword')
    ->middleware('auth');

// Guest-only routes
Route::group(['middleware' => 'guest'], function () {
    Route::get('/register', [AuthController::class, 'showRegistrationForm'])->name('auth.showRegistrationForm');
    Route::post('/register', [AuthController::class, 'register'])->name('auth.register');
    Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login');
    Route::post('/login', [AuthController::class, 'login'])->name('auth.login');
});

// Route::get('/bookmarks', [BookmarkController::class, 'index'])->name('bookmarks.index');
// Route::get('/bookmarks/new', [BookmarkController::class, 'create'])->name('bookmarks.new');
// Route::post('/bookmarks/store', [BookmarkController::class, 'store'])->name('bookmarks.store');
// Route::get('/login', [AuthController::class, 'showLoginForm'])->name('auth.showLoginForm');
// Route::post('/login', [AuthController::class, 'login'])->name('auth.login');
