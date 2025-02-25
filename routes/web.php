<?php

use App\Http\Controllers\dashboard\competitionController;
use App\Http\Controllers\dashboard\QuestionController;
use App\Http\Controllers\homeController;
use Illuminate\Support\Facades\Route;

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

Route::get('/', [homeController::class, 'index'])->name('home');
Route::get('/questions/{user}', [homeController::class, 'questions'])->name('questions');
Route::get('/ramadan', [homeController::class, 'selectRamadanUsers'])->name('ramadan.index');
Route::get('/ramadan/random-user', [homeController::class, 'getRandomUser'])->name('ramadan.random-user');



Route::get('/login', function () {
    return view('dashboard.index');
})->name('login');

Route::get('/register', function () {
    return view('auth.register');
})->name('logout');



Route::group(['prefix' => 'dashboard'], function () {

    Route::get('/', function () {
        return view('dashboard.index');
    })->name('home.dashboard');

    Route::resources(['questions' => QuestionController::class]);
    Route::put('questions/{question}/update-status', [QuestionController::class, 'updateStatus'])->name('questions.updateStatus');
    Route::resources(['competitions' => competitionController::class]);
});
