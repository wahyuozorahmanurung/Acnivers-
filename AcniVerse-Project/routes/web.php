<?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\ScanController;
use Illuminate\Support\Facades\Route;

Route::get('/', [HomeController::class, 'index'])->name('homepage');
Route::get('/scan', [ScanController::class, 'index'])->name('scan');
Route::post('/scan', [ScanController::class, 'scan'])->name('scan.proses');