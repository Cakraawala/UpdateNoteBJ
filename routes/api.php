<?php

use App\Http\Controllers\UpdateInfoController;
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

// Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
//     return $request->user();
// });

Route::controller(UpdateInfoController::class)->group(function(){
    Route::get('/update', 'index'); //udh
    Route::post('/update', 'store'); //blm
    Route::get('/update?recent', 'getrecentup'); //udh
    Route::get('/update/{id}', 'getupdate'); //test
    Route::delete('/update/{id}', 'destroy'); //udh
});

