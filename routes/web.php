<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\NewsController;
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

Route::middleware('nologin')->group(function () {
    // Auth
    Route::get('/', [AuthController::class, 'index'])->name('/');
    Route::post('login', [AuthController::class, 'login'])->name('login');
});

Route::middleware('islogin')->group(function () {
    // Berita
    Route::get('home', [NewsController::class, 'index'])->name('home');
    Route::get('create', [NewsController::class, 'create'])->name('news.create');
    Route::post('store', [NewsController::class, 'store'])->name('news.store');
    Route::post('update/{id}', [NewsController::class, 'update'])->name('news.update');
    Route::get('detail/{id}', [NewsController::class, 'detail'])->name('news.detail');
    Route::get('edit/{id}', [NewsController::class, 'edit'])->name('news.edit');
    Route::post('destroy/{id}', [NewsController::class, 'destroy'])->name('news.destroy');

    // Auth
    Route::post('logout', [AuthController::class, 'logout'])->name('logout');
    Route::post('profile/update', [AuthController::class, 'update'])->name('profile.update');
});
