<?php

use App\Http\Controllers\ApiController;
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
Route::get('login', [ApiController::class, 'login'])->name('api.login');

Route::middleware('auth:api')->group(function () {
    Route::post('logout', [ApiController::class, 'logout'])->name('api.logout');
    Route::post('save-record', [ApiController::class, 'saveRecord'])->name('api.save');
});
