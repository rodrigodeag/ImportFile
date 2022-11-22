<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\FileController;
use App\Http\Controllers\StoreController;
use App\Http\Controllers\ClientController;

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
//Routes Clients
Route::get('/client/', [ClientController::class, 'getAllClient']);
Route::get('/client/{id}', [ClientController::class, 'getClientById']);
//Routes Store
Route::get('/store/', [StoreController::class, 'getAllStore']);
Route::get('/store/{id_store}', [StoreController::class, 'getStoreById']);
//Routes Report by store
Route::get('/reportStore/', [FileController::class, 'apiReportAllStore']);
Route::get('/reportStore/{id}', [FileController::class, 'apiReportByStoreId']);
//Routes Report by client
Route::get('/reportClient/', [FileController::class, 'apiReportAllClient']);
Route::get('/reportClient/{id}', [FileController::class, 'apiReportByClientId']);