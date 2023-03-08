<?php

use App\Http\Controllers\BandController;
use App\Http\Controllers\HelloWorldController;
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


// Route::get('hello/{name}', function($name){
//     return 'Hello '.$name;
// });

// Route::post('hello-post', function(){
//     return "Hello Post";
// });

// Route::get('hello-post/{name}', [HelloWorldController::class, 'hello']);

Route::get('bands', [BandController::class, 'getAll']);
Route::post('bands/store', [BandController::class, 'store']);
Route::get('bands/gender/{gender}', [BandController::class, 'getBandsByGender']);
Route::get('bands/{ID}', [BandController::class, 'getById']);

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
