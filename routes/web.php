<?php

use App\Http\Controllers\EmployeesController;
use App\Http\Controllers\LeaveRequestController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\SalarySlipsController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return redirect('register');
});
Route::get('/employees', [EmployeesController::class,'index'])->name('employees');
Route::get('/employeedetails', [ProfileController::class,'index'])->name('profile.index');

Route::get('/employees/create', [EmployeesController::class, 'create']);
Route::post('/employees', [EmployeesController::class, 'store']);
Route::get('/employee/{id}', [EmployeesController::class, 'show'])->name('employe.detail');

//Salary Slip Route
Route::get('/salary-slips', [SalarySlipsController::class, 'index'])->name('salary-slips');
Route::post('/salary-slips', [SalarySlipsController::class, 'store'])->name('salary-slips.store');

// employee profile for users
Route::get('/employeedetails', [ProfileController::class, 'index'])->name('profile.index');

// leave requests
Route::get('/leaverequests', [LeaveRequestController::class,'index'])->name('leaverequest.index');
Route::patch('/leaverequests/check/{id}', [LeaveRequestController::class,'check'])->name('leaverequest.check');
Route::patch('/leaverequests/reject/{id}', [LeaveRequestController::class,'reject'])->name('leaverequest.reject');


Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard.index');
});