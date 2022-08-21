<?php

use App\Http\Controllers\ChampionController;
use App\Http\Controllers\SkinController;
use App\Http\Resources\ChampionResource;
use App\Http\Resources\SkinResource;
use Illuminate\Http\Request;
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

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

// Route::get('/champions', [ChampionController::class,'index']);
// Route::get('/champions/{id}', [ChampionController::class,'show']);

Route::resource('/champions',ChampionController::class)->only(['index', 'show', 'store','update', 'destroy']);
Route::resource('/skins', SkinController::class)->only(['index', 'show', 'store','update', 'destroy']);
