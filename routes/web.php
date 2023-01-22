<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PagesController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\AuthFormsController;
use App\Http\Controllers\PastesFormsController;
use App\Http\Controllers\UserController;

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
Route::get('/paste/{id}', [PagesController::class, 'get'])->name('pastePage');
Route::get('/create', [PastesFormsController::class, 'create'])->name('create');
Route::get('/user_pastes', [PagesController::class, 'userPastes'])->name('userPastes');
Route::get('/profile', [UserController::class, 'profile'])->name('profile');

Route::post('/store', [PagesController::class, 'store'])->name('store');
Route::post('/delete', [PagesController::class, 'delete'])->name('destroy');
Route::post('/update', [PagesController::class, 'update'])->name('update');



Route::get('/login', [AuthFormsController::class, 'login'])->name('login');
Route::post('/login_process', [AuthController::class, 'login'])->name('login_process');
Route::get('/logout', [AuthController::class, 'logout'])->name('logout');

Route::get('/register', [AuthFormsController::class, 'register'])->name('register');
Route::post('/register_process', [AuthController::class, 'register'])->name('register_process');


