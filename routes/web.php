<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PagesController;
use App\Http\Controllers\DataController;
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

Route::get('/', [PagesController::class, 'all'])->name('all');
Route::get('/public', [PagesController::class, 'public'])->name('public');
Route::get('/private', [PagesController::class, 'private'])->name('private');
Route::get('/paste/{id}', [PagesController::class, 'pastePage'])->name('pastePage'); // передавать slug
Route::get('/create', [PagesController::class, 'form'])->name('create');
Route::get('/user_pastes', [PagesController::class, 'userPastes'])->name('userPastes');
Route::get('/profile', [PagesController::class, 'profile'])->name('profile');

Route::post('/store', [DataController::class, 'store']);
Route::post('/delete', [DataController::class, 'destroy']);
Route::post('/update', [DataController::class, 'statusUpdate']);

Route::middleware('auth')->group(function () {
    Route::get('/logout', [AuthController::class, 'logout'])->name('logout');
});

Route::middleware('guest')->group(function () {
    Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login');
    Route::post('/login_process', [AuthController::class, 'login'])->name('login_process');

    Route::get('/register', [AuthController::class, 'showRegisterForm'])->name('register');
    Route::post('/register_process', [AuthController::class, 'register'])->name('register_process');
});

