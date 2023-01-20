<?php

use App\Http\Controllers\AuthFormsController;
use App\Http\Controllers\PageFormsController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PagesController;
use App\Http\Controllers\AuthController;

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

Route::prefix('/pastes')->group(function() {
    Route::get('/', [PagesController::class, 'all'])->name('all');
    Route::post('/', [PagesController::class, 'store'])->name('store');
    Route::delete('/{id}', [PagesController::class, 'delete'])->name('destroy');
    Route::post('/update', [PagesController::class, 'update'])->name('statusUpdate');
    Route::get('/public', [PagesController::class, 'public'])->name('public');
    Route::get('/private', [PagesController::class, 'private'])->name('private');
    Route::get('/{id}', [PagesController::class, 'get'])->name('pastePage'); // передавать slug
    Route::get('/create', [PageFormsController::class, 'create'])->name('create');
    Route::get('/user_pastes', [PagesController::class, 'users'])->name('userPastes');
});

Route::prefix('/users')->group(function () {
    Route::get('/profile', [UserController::class, 'profile'])->name('profile');
});

Route::prefix('/auth')->group(function () {
    Route::get('/login', [AuthFormsController::class, 'login'])->name('login');
    Route::post('/login_process', [AuthController::class, 'login'])->name('login_process');
    Route::get('/logout', [AuthController::class, 'logout'])->name('logout');

    Route::get('/register', [AuthFormsController::class, 'register'])->name('register');
    Route::post('/register_process', [AuthController::class, 'register'])->name('register_process');
});



