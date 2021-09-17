<?php

use App\Http\Controllers\ApiController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

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
require __DIR__.'/auth.php';


Route::get('/', function () {
    return view('welcome');
})->name('home');

Route::get('/dashboard', function () {
    return redirect('date-list');
})->middleware(['auth'])->name('dashboard');

//user
Route::group(['middleware'=>'auth'], function (){
    Route::get('/profile', [UserController::class, 'profile'])->name('profile');
    Route::post('/modify', [UserController::class, 'modify'])->name('modify');
    Route::get('/date-list', [UserController::class, 'dateList'])->name('date-list');
    Route::post('/date-table', [UserController::class, 'dateTable'])->name('date-table');
    Route::get('/date-detail/{id}', [UserController::class, 'dateDetail'])->name('date-detail');
    Route::post('/record-delete/{id}', [UserController::class, 'recordDelete'])->name('record-delete');
    Route::get('/part-list', [UserController::class, 'partList'])->name('part-list');
    Route::post('/part-table', [UserController::class, 'partTable'])->name('part-table');
});
Route::prefix('v1')->group(function(){
    Route::post('login', [ApiController::class, 'login'])->name('api.login');
    Route::group(['middleware'=>'auth'], function (){
        Route::post('logout', [ApiController::class, 'logout'])->name('api.logout');
        Route::post('save-record', [ApiController::class, 'saveRecord'])->name('api.save');

    });
});
