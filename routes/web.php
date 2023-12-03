<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TaskController;

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

/* Route::get('/', function () {
    return view('index');
}); */

Route::get('/', [TaskController::class, 'index'])->name("index");

Route::get('/create', [TaskController::class, 'create'])->name("create");

Route::post('/store', [TaskController::class, 'store'])->name("store");

Route::delete('/destroy{id}', [TaskController::class, 'destroy'])->name("destroy");

Route::get('/edit{id}', [TaskController::class, 'edit'])->name("edit");

Route::put('/update{id}', [TaskController::class, 'update'])->name("update");

Route::get('/update{id}/{status}', [TaskController::class, 'update_status'])->name("update_status");

//Route::resource('tasks', TaskController::class);


