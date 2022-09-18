<?php

use App\Http\Controllers\CategoryController;
use App\Http\Controllers\CompanyController;
use App\Http\Controllers\GrantController;
use App\Http\Controllers\UserController;
use App\Models\Contact;
use Illuminate\Support\Facades\Route;

Route::middleware(['auth'])->group(function () {
    Route::get('/', fn() => view('home'))->name('home');
    Route::resource('users', UserController::class);
    Route::resource('companies', CompanyController::class);
    Route::resource('categories', CategoryController::class);
    Route::resource('companies.contacts', Contact::class)->shallow();
    Route::resource('companies.grants', GrantController::class)->shallow();
    Route::get('/grants', [GrantController::class, 'index'])->name('grants.index');
    Route::post('/grants', [GrantController::class, 'store'])->name('grants.store');
});

Route::get('/companies/{company}/preview', [GrantController::class, 'preview'])
    ->name('grants.preview')
    ->middleware('signed');
