<?php

use App\Http\Controllers\SiteController;
use Illuminate\Support\Facades\Route;



Route::get('/', [SiteController::class, 'index'])->name('site.home');
Route::get('/correction/{slug}', [SiteController::class, 'detail_correction'])->name('site.correction');