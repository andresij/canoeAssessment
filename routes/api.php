<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\FundController;
use App\Http\Controllers\FundsManagerController;
use App\Http\Controllers\CompanyController;
use App\Models\Duplicate;


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

Route::apiResource ('/funds', FundController::class);

// this is to be able to apply filtering by founds manager on founds (we need to send the id for filtering)
Route::get ('/fundsmanagers', [FundsManagerController::class, 'index']);

// This is for the fund update method: if you want to change the companies for a iven fund, you must send the companies id's
Route::get ('/companies', [CompanyController::class, 'index']);

Route::get ('/duplicates', function () {
    return Duplicate::all();
});
