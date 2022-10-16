<?php


use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Admin\AdminController;

Route::get('/dashboard', [AdminController::class, 'dashboard'])->name('dashboard');

Route::get('/demo', [AdminController::class, 'admindemo'])->name('demo');
Route::get('/index', [AdminController::class, 'demoindex'])->name('index');



Route::prefix('user')
->name('user.')->group(function () {
    Route::get('/createuser', [UserController::class, 'create'])->name('create');
    Route::put('/create', [UserController::class, 'store'])->name('store');
    Route::get('/', [UserController::class, 'index'])->name('index');
    Route::get('/{user}/edit', [UserController::class, 'edit'])->name('edit');
    Route::put('/{user}', [UserController::class, 'update'])->name('update');
    Route::put('/{user}/secret', [UserController::class, 'secret'])->name('secret');
    Route::delete('/', [UserController::class, 'destroy'])->name('destroy');
    Route::put('/{id}/status', [UserController::class, 'status'])->name('status');
    Route::put('/{id}/status/api', [UserController::class, 'status_api'])->name('status.api');
    Route::get('/{id}/login', [UserController::class, 'login'])->name('login');
});



Route::prefix('faq')
->name('faq.')->group(function () {
    Route::get('/indexfaq', [FaqController::class, 'index'])->name('index');
    Route::get('/createfaq', [FaqController::class, 'create'])->name('create');
    Route::post('/', [FaqController::class, 'store'])->name('store');
    Route::get('/{id}', [FaqController::class, 'show'])->name('show');
    Route::get('/{id}/edit', [FaqController::class, 'edit'])->name('edit');
    Route::put('/{id}', [FaqController::class, 'update'])->name('update');
    Route::delete('/{id}', [FaqController::class, 'destroy'])->name('destroy');
});



Route::prefix('page')
->name('page.')->group(function () {
    Route::get('/indexpage', [PageController::class, 'index'])->name('index');
    Route::get('/createpage', [PageController::class, 'create'])->name('create');
    Route::post('/', [PageController::class, 'store'])->name('store');
    Route::get('/{id}', [PageController::class, 'show'])->name('show');
    Route::get('/{id}/edit', [PageController::class, 'edit'])->name('edit');
    Route::put('/{id}', [PageController::class, 'update'])->name('update');
    Route::delete('/{id}', [PageController::class, 'destroy'])->name('destroy');
});


