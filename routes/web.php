<?php

use App\Http\Controllers\DashboardController;
use App\Http\Controllers\EmployeesController;
use App\Http\Controllers\LeaveRequestController;
use App\Http\Controllers\PermissionController;
use App\Http\Controllers\PotonganBonusController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\SalarySlipsController;
use App\Models\PotonganBonus;
use Illuminate\Support\Facades\Route;
use SebastianBergmann\CodeCoverage\Report\Html\Dashboard;

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

// employee profile for users
Route::get('/employeedetails', [ProfileController::class, 'index'])->name('profile.index');
Route::get('/employeedetails/create-leave-request', [ProfileController::class,'leave_request'])->name('profile.leave_request');
Route::get('/employeedetails/my-salary-slip', [ProfileController::class,'salary_slip'])->name('profile.salary_slip');
Route::post('/employeedetails/create-leave-request/create', [ProfileController::class, 'leave_request_create'])->name('profile.leave_request.create');
Route::get('employeedetails/leave-requests', [ProfileController::class, 'leave_request_show'])->name('profile.leave_requests.show');
Route::get('/employeedetails/permission', [ProfileController::class, 'permission'])->name('profile.permission');
Route::post('/employeedetails/permission/create', [ProfileController::class, 'permission_create'])->name('profile.permission.create');
Route::get('/employeedetails/permission/show', [ProfileController::class, 'permission_show'])->name('profile.permission.show');

Route::middleware([
    'auth:sanctum','is_admin',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    // Dashboard
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard.index');

    // Staffs
    Route::get('/employees', [EmployeesController::class,'index'])->name('employees.index');
    Route::get('/employees/create', [EmployeesController::class, 'create'])->name('employees.create');
    Route::post('/employees', [EmployeesController::class, 'store']);
    Route::get('/employee/details/{id}', [EmployeesController::class, 'show'])->name('employee.detail');
    Route::get('/employee/edit/{id}', [EmployeesController::class, 'edit'])->name('employee.edit');
    Route::patch('/employee/update/{id}', [EmployeesController::class, 'update'])->name('employee.update');
    Route::delete('/employee/{id}', [EmployeesController::class, 'destroy'])->name('employee.destroy');

    //Salary Slip Route
    Route::get('/salary-slips', [SalarySlipsController::class, 'index'])->name('salary-slips.index');
    Route::get('/salary-slips/create', [SalarySlipsController::class, 'create'])->name('salary-slips.create');
    Route::get('/salary-slips/create/{id}', [SalarySlipsController::class, 'create_form'])->name('salary-slips.create_form');
    Route::post('/salary-slips', [SalarySlipsController::class, 'store'])->name('salary-slips.store');
    Route::get('/salary-slips/print/{id}', [SalarySlipsController::class, 'print_pdf'])->name('salary-slips.print_pdf');
    Route::get('/salary-slips/{id}', [SalarySlipsController::class, 'show'])->name('salary-slips.show');

    // PotonganBonus Route
    Route::get('bonus-cut/{id}', [PotonganBonusController::class, 'edit'])->name('potongan-bonus.edit');
    Route::patch('/bonus-cut/{id}', [PotonganBonusController::class, 'update'])->name('potongan-bonus.update');

    // leave requests
    Route::get('/leaverequests', [LeaveRequestController::class,'index'])->name('leaverequest.index');
    Route::patch('/leaverequests/check/{id}', [LeaveRequestController::class,'check'])->name('leaverequest.check');
    Route::patch('/leaverequests/reject/{id}', [LeaveRequestController::class,'reject'])->name('leaverequest.reject');
    Route::patch('/leaverequests/reset', [LeaveRequestController::class, 'reset'])->name('leaverequest.reset');
    Route::delete('/leaverequests/delete', [LeaveRequestController::class, 'delete'])->name('leaverequest.delete');

    // permission
    Route::get('/permissions', [PermissionController::class, 'index'])->name('permission.index');
    Route::get('permissoin/create', [PermissionController::class, 'create'])->name('permission.create');
    Route::get('/permission/create/{id}', [PermissionController::class, 'create_form'])->name('permission.create_form');
    Route::post('/permission/{id}', [PermissionController::class, 'store'])->name('permission.store');
    Route::patch('/permission/check/{id}', [PermissionController::class, 'check'])->name('permission.check');
    Route::delete('/permission/delete', [PermissionController::class, 'delete'])->name('permission.delete');
});