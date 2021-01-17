<?php

use App\Http\Controllers\CharacterController;
use App\Http\Controllers\EpisodeController;
use App\Http\Controllers\LocationController;
use Illuminate\Support\Facades\Route;

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

Route::get('characters', [CharacterController::class, 'all']);
Route::get('characters/{id}', [CharacterController::class, 'show']);
Route::get('locations', [LocationController::class, 'all']);
Route::get('locations/{id}', [LocationController::class, 'show']);
Route::get('episodes', [EpisodeController::class, 'all']);
Route::get('episodes/{id}', [EpisodeController::class, 'show']);
