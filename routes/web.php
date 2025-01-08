<?php

// routes/web.php
use App\Http\Controllers\JadwalKeretaController;

Route::resource('jadwal', JadwalKeretaController::class);
Route::get('jadwal/{jadwal}/edit', [JadwalKeretaController::class, 'edit'])->name('jadwal.edit');
Route::resource('jadwal', JadwalKeretaController::class);


Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
