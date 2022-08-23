<?php

use App\Http\Controllers\API\AuthController;
use App\Http\Controllers\ChampionController;
use App\Http\Controllers\ChampionSkinController;
use App\Http\Controllers\SkinController;
use App\Http\Controllers\UserChampionController;
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
//Route::resource('/skins', SkinController::class)->only(['index', 'show', 'store','update', 'destroy']);
//Route::resource('champions.skins', ChampionSkinController::class)->only('index');
Route::post('/register', [AuthController::class, 'register']);
Route::post('/login', [AuthController::class, 'login']);
Route::post('/logout', [AuthController::class, 'logout']);

Route::get('/profile/{user_id}', [UserChampionController::class, 'index']);
Route::post('/profile/{user_id}/buy/{champion_id}', [UserChampionController::class, 'store']);
Route::delete('/profile/{user_id}/sell/{champion_id}',[UserChampionController::class,'destroy']);

