<?php

use App\Http\Controllers\TestController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('Home');
})->name('home');
Route::get('/syntaxPract', [TestController::class, 'syntaxPract'])->name('syntaxPract');
Route::get('/debug', [TestController::class, 'debug'])->name('debug');
Route::get('/projTest', [TestController::class, 'projTest'])->name('projTest');
Route::get('/boxgame', [TestController::class, 'boxgame'])->name('boxgame');
Route::get('/unLock', [TestController::class, 'unLock'])->name('unLock');
Route::get('/idcardgame', [TestController::class, 'idcardgame'])->name('idcardgame');