<?php

use App\Http\Controllers\API\AuthController;
use App\Http\Controllers\ChampionController;
use App\Http\Controllers\ChampionSkinController;
use App\Http\Controllers\SkinController;
use App\Http\Controllers\UserChampionController;
use App\Http\Controllers\UserSkinController;
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

Route::post('/register', [AuthController::class, 'register']);
Route::post('/login', [AuthController::class, 'login']);

Route::resource('/champions', ChampionController::class)->only(['index', 'show', 'store', 'update', 'destroy']);
Route::resource('/skins', SkinController::class)->only(['index', 'show', 'store', 'update', 'destroy']);
Route::resource('champions.skins', ChampionSkinController::class)->only('index');

// Route::get('/champions', [ChampionController::class,'index']);
// Route::get('/champions/{id}', [ChampionController::class,'show']);

Route::group(['middleware' => ['auth:sanctum']], function () {
    Route::get('profile', function (Request $request) {
        return auth()->user();
    });
    Route::get('/profile/champions', [UserChampionController::class, 'index']);
    Route::post('/profile/champions/buy/{champion_id}', [UserChampionController::class, 'store']);
    Route::delete('/profile/champions/sell/{champion_id}', [UserChampionController::class, 'destroy']);

    Route::get('/profile/skins', [UserSkinController::class, 'index']);
    Route::post('/profile/skins/buy/{skin_id}', [UserSkinController::class, 'store']);
    Route::delete('/profile/skins/sell/{skin_id}',[UserSkinController::class,'destroy']);

    Route::post('/logout', [AuthController::class, 'logout']);
});

// Route::get('/profile/{user_id}', [UserChampionController::class, 'index']);
