<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\EmployeeController;

Route::get('/employees', [EmployeeController::class, 'index']); // Baca Data
Route::post('/employees', [EmployeeController::class, 'store']); // Tambah Data
Route::put('/employees/{id}', [EmployeeController::class, 'update']); // Edit Data
Route::delete('/employees/{id}', [EmployeeController::class, 'destroy']); // Hapus Data