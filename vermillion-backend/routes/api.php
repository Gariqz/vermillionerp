<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\EmployeeController;
use App\Http\Controllers\LeaveController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\ComplaintController;
use App\Http\Controllers\FacilityController;
use App\Http\Controllers\FacilityRequestController;
use App\Http\Controllers\ReportController;
use App\Http\Controllers\HostController;
use App\Http\Controllers\FinanceController;
use App\Http\Controllers\DashboardController;

// API Karyawan
Route::get('/employees', [EmployeeController::class, 'index']);
Route::post('/employees', [EmployeeController::class, 'store']);
Route::put('/employees/{id}', [EmployeeController::class, 'update']);
Route::delete('/employees/{id}', [EmployeeController::class, 'destroy']);

// API Izin & Cuti
Route::get('/leaves', [LeaveController::class, 'index']);
Route::post('/leaves', [LeaveController::class, 'store']);
Route::put('/leaves/{id}/status', [LeaveController::class, 'updateStatus']);

// API Login
Route::post('/login', [AuthController::class, 'login']);

// API Pengaduan
Route::get('/complaints', [ComplaintController::class, 'index']);
Route::post('/complaints', [ComplaintController::class, 'store']);
Route::put('/complaints/{id}', [ComplaintController::class, 'update']);
Route::delete('/complaints/{id}', [ComplaintController::class, 'destroy']);

// API Fasilitas
Route::apiResource(
    'facilities',
    FacilityController::class
);

Route::apiResource(
    'facility-requests',
    FacilityRequestController::class
);

Route::put(
    'facility-requests/{id}/approve',
    [FacilityRequestController::class, 'approve']
);

Route::put(
    'facility-requests/{id}/reject',
    [FacilityRequestController::class, 'reject']
);

// API Arsip Laporan
Route::get('/reports', [ReportController::class, 'index']);
Route::post('/reports', [ReportController::class, 'store']);
Route::delete('/reports/{id}', [ReportController::class, 'destroy']);

// API Host
Route::get(
    '/host/{user_id}/dashboard',
    [HostController::class, 'getDashboard']
);

Route::get(
    '/host/{user_id}/reports',
    [HostController::class, 'getReports']
);

Route::post(
    '/host/{user_id}/reports',
    [HostController::class, 'submitReport']
);

// API Finance
Route::get(
    '/finance/dashboard',
    [FinanceController::class, 'getDashboard']
);

Route::put(
    '/finance/reports/{id}/status',
    [FinanceController::class, 'updateReportStatus']
);

Route::get(
    '/finance/income',
    [FinanceController::class, 'getIncomes']
);

// API Profile
Route::middleware('auth:sanctum')->get(
    '/profile',
    function (Request $request) {
        return response()->json($request->user());
    }
);


//API request
Route::apiResource(
    'facility-requests',
    FacilityRequestController::class
);

Route::put(
    'facility-requests/{id}/approve',
    [FacilityRequestController::class, 'approve']
);

Route::put(
    'facility-requests/{id}/reject',
    [FacilityRequestController::class, 'reject']
);

Route::get(
    '/facility-requests/user/{id}',
    [FacilityRequestController::class, 'getByUser']
);

Route::get(
    '/host/{id}/dashboard',
    [DashboardController::class, 'hostDashboard']
);

Route::get(
    '/host/{id}/dashboard',
    [DashboardController::class, 'hostDashboard']
);