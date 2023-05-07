<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DiabetesController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::controller(AuthController::class)->prefix('user')->group(function () {
    Route::post('register', 'registerUser')->name('register');
    Route::post('login', 'loginUser')->name('login');
    Route::get('logout', 'logoutUser')->middleware('auth:sanctum');
    Route::post('forgot-password', 'forgotPass');
    Route::post('reset-password', 'resetPass');
});
Route::get('/predict',[DiabetesController::class, 'index']);
Route::get('/show', DiabetesController::class, 'showRecords')->name('show');
Route::post('/predict',[DiabetesController::class, 'predict'])->name('predict');