<?php

use App\Http\Controllers\LoginController;
use App\Http\Controllers\RedactionController;
use App\Http\Controllers\SiteController;
use Illuminate\Support\Facades\Route;



Route::get('/', [SiteController::class, 'index'])->name('site.home');
Route::get('/correction/{slug}', [SiteController::class, 'detail_correction'])->name('site.correction');
Route::get('/writing', [SiteController::class, 'new_redaction'])->name('site.redaction');

Route::view('/login', 'login.form')->name('login.form');
Route::post('/auth', [LoginController::class, 'auth'])->name('login.auth');
Route::post('/sendredaction', [RedactionController::class, 'send_redaction'])->name('send.redaction');