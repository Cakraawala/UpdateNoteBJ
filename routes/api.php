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
    Route::get('/update', 'index'); //all data update with pagination
    Route::post('/update', 'store'); // store data update dan feature
    Route::get('/update/recent', 'getrecentup'); //get update terbaru (recent)
    Route::get('/update/{id}', 'getupdate'); //get update by id
    Route::delete('/update/{id}', 'destroy'); //destroy by id
});

