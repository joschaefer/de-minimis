<?php

use App\Http\Controllers\CategoryController;
use App\Http\Controllers\CompanyController;
use App\Http\Controllers\GrantController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

Route::middleware(['auth'])->group(function () {
    Route::get('/', fn() => view('home'))->name('home');
    Route::resource('users', UserController::class)->except(['show', 'create']);
    Route::resource('companies', CompanyController::class)->except(['create']);
    Route::resource('categories', CategoryController::class)->except(['show', 'create']);
    // Route::resource('companies.contacts', ContactController::class)->shallow();
    Route::resource('companies.grants', GrantController::class)->shallow();
    Route::post('/companies/{company}/grants/import', [GrantController::class, 'import'])->name('companies.grants.import');
    Route::get('/grants', [GrantController::class, 'index'])->name('grants.index');
    Route::post('/grants', [GrantController::class, 'store'])->name('grants.store');
    Route::post('/grants/import', [GrantController::class, 'import'])->name('grants.import');
});

Route::get('/companies/{company}/preview', [GrantController::class, 'preview'])
    ->name('grants.preview')
    ->middleware('signed');
