<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\AuthFormsController;
use App\Http\Controllers\PastesController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

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

Route::get('/', [PastesController::class, 'all'])->name('all');
Route::get('/public', [PastesController::class, 'public'])->name('public');
Route::get('/private', [PastesController::class, 'private'])->middleware('auth')->middleware('banned')->name('private');
Route::get('/paste/{hash}', [PastesController::class, 'get'])->name('pastePage');
Route::get('/create', [PastesController::class, 'create'])->name('create')->middleware('banned');
Route::get('/user_pastes', [PastesController::class, 'userPastes'])->middleware('auth')->name('userPastes');
Route::get('/profile', [UserController::class, 'profile'])->middleware('auth')->name('profile');

Route::post('/store', [PastesController::class, 'store'])->name('store');
Route::post('/delete', [PastesController::class, 'delete'])->name('delete');
Route::post('/update', [PastesController::class, 'update'])->name('update');
Route::post('/paste/{hash}/report', [PastesController::class, 'report'])->name('report')->middleware('auth');

Route::get('/login', [AuthFormsController::class, 'login'])->name('login');
Route::post('/login_process', [AuthController::class, 'login'])->name('login_process');
Route::get('/logout', [AuthController::class, 'logout'])->middleware('auth')->name('logout');
Route::get('/sign-in/github', [AuthController::class, 'github'])->name('github');
Route::get('/sign-in/github/redirect', [AuthController::class, 'githubRedirect'])->name('githubRedirect');

Route::get('/register', [AuthFormsController::class, 'register'])->name('register');
Route::post('/register_process', [AuthController::class, 'register'])->name('register_process');

Route::get('/banned', [AuthController::class, 'banned'])->name('banned');
