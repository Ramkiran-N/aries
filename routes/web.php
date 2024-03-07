<?php

use App\Http\Controllers\admin\Index\IndexController;
use App\Http\Controllers\User\Index\IndexController as userIndexController;
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

Route::get('/', function () {
    return view('index');
});
Route::prefix('admin')->group(function () {
    Route::any('/', [IndexController::class, 'index'])->name('admin.index');
    Route::any('add-question', [IndexController::class, 'addQuestion'])->name('addQuestion');
});

Route::prefix('user')->group(function () {
    Route::any('/', [userIndexController::class, 'index'])->name('user.index');
    Route::any('register', [userIndexController::class, 'register'])->name('user.register');
    Route::any('submit-answer', [userIndexController::class, 'submitAnswer'])->name('user.submitAnswer');
    Route::any('result/{email}', [userIndexController::class, 'result'])->name('user.result');
    Route::any('results', [userIndexController::class, 'results'])->name('user.results');
});