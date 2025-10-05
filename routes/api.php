<?php

use App\Http\Controllers\CustomerController;
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

Route::get('/test',function(){
    return "Hello Mony";
});


Route::get('/customers',[CustomerController::class,'index']);
Route::post('/customers',[CustomerController::class, 'store']);
Route::delete('/customers/{id}',[CustomerController::class, 'destroy']);
Route::put('/update/{id}',[CustomerController::class, 'update']);


