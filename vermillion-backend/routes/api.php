<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\EmployeeController;
use App\Http\Controllers\LeaveController;
use App\Http\Controllers\AuthController;
use App\Models\User;

Route::get('/employees', [EmployeeController::class, 'index']); // Baca Data
Route::post('/employees', [EmployeeController::class, 'store']); // Tambah Data
Route::put('/employees/{id}', [EmployeeController::class, 'update']); // Edit Data
Route::delete('/employees/{id}', [EmployeeController::class, 'destroy']); // Hapus Data
// API Izin & Cuti
Route::get('/leaves', [LeaveController::class, 'index']); // Dipakai HR
Route::post('/leaves', [LeaveController::class, 'store']); // Dipakai Host/Karyawan
Route::put('/leaves/{id}/status', [LeaveController::class, 'updateStatus']); // Dipakai HR
Route::post('/login', [AuthController::class, 'login']);

Route::get('/contacts', function () {
    // Mengambil data user yang memiliki tim/divisi dari database
    $users = User::whereNotNull('team')
        ->get(['id', 'name', 'team', 'role', 'phone']);
    
    return response()->json([
        'success' => true,
        'data' => $users
    ]);
});