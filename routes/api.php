<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TaskControllerApi;

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

Route::get('/',[TaskControllerApi::class, 'index']);

Route::post('/store',[TaskControllerApi::class, 'store']);

Route::put('/update{id}',[TaskControllerApi::class, 'update']);

Route::delete('/destroy{id}',[TaskControllerApi::class, 'destroy']);

Route::get('/update{id}/{status}', [TaskControllerApi::class, 'update_status']);
