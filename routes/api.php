<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\api\UserApiController;
use App\Http\Controllers\api\PasteApiController;


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

Route::get('/pastes', [PasteApiController::class, 'index']);
Route::post('/pastes', [PasteApiController::class, 'store']);
Route::get('/pastes/{id}', [PasteApiController::class, 'show']);
Route::get('/pastes/public', [PasteApiController::class, 'showPublic']);
Route::get('/pastes/private', [PasteApiController::class, 'showPrivate']);
Route::put('/pastes/{id}', [PasteApiController::class, 'update']);
Route::post('/pastes/{id}/report', [PasteApiController::class, 'report']);
Route::delete('/pastes/{id}', [PasteApiController::class, 'delete']);

Route::post('/users', [UserApiController::class, 'register']);
Route::get('/profile', [UserApiController::class, 'profile']);

Route::post('/users/login', [UserApiController::class, 'login']);
Route::post('/users/logout', [UserApiController::class, 'logout']);
