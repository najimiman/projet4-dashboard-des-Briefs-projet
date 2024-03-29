<?php

use App\Http\Controllers\annee_formationController;
use App\Http\Controllers\Dashbordcontroller;
use App\Http\Controllers\Formateurcontroller;
use App\Models\Annee_formation;
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

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
Route::controller(Dashbordcontroller::class)->group(function(){
    Route::get('/group/{id}', 'formation');
    Route::get('/group', 'years');
    Route::get('/studentAv', 'studentAv');
    // Route::get('/lastY', 'lastYear');
});
// Route::get('formation/{id}',[annee_formationController::class,'formation'])->name('formation');
// Route::resource('Anneformation',annee_formationController::class);
// Route::get('/formation/{id}',[Dashbordcontroller::class,'formation'])->name('formation');