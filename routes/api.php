<?php

use App\Http\Controllers\FacturaController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::post('/login', [FacturaController::class,"login"]);

// 'ability:leer,admin' tiene que tener una (o mas) de las habilidades
Route::middleware(['auth:sanctum','ability:leer,admin'])->get("/obtener/{id}",[FacturaController::class,"obtener"]);
// 'abilities:leer,admin' tiene que tener todas las habilidades indicadas.
Route::middleware(['auth:sanctum','abilities:leer,escribir'])->get("/obtener",[FacturaController::class,"obtener"]);
