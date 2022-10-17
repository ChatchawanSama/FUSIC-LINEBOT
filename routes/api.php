<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Models\Controllers\Api;

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

// Route::apiResource('/webhook',\App\Http\Controllers\Api\WebhookController::class);
Route::post('/webhook', [\App\Http\Controllers\LineController::class, 'webhook']);
Route::get('/liff', [\App\Http\Controllers\LoginController::class, 'liff']);

Route::apiResource('items', \App\Http\Controllers\Api\ItemsController::class);