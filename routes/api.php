<?php

use App\Http\Controllers\NotebookController;
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

//Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
//    return $request->user();
//});

Route::get('/v1/notebook/', [NotebookController::class, 'index']);
Route::post('/v1/notebook/', [NotebookController::class, 'store']);
Route::get('/v1/notebook/{id}', [NotebookController::class, 'show']);
Route::post('/v1/notebook/{id}', [NotebookController::class, 'update']);
Route::delete('/v1/notebook/{id}', [NotebookController::class, 'destroy']);
