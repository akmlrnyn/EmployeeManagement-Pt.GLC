<?php

namespace App\Http\Controllers;

use App\Models\Employee;
use App\Models\LeaveRequest;
use App\Models\Permission;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index() {
        $total_employee = Employee::all()->count();
        $pending_request_new = LeaveRequest::take(3)->where('status', 'pending')->get();
        $permission_new = Permission::take(3)->where('status', 'pending')->get();
        $total_pending_request_new = LeaveRequest::where('status', 'pending')->count();
        $total_permission_new = Permission::where('status', 'pending')->count();
        
        return view('dashboard',compact('total_employee', 'pending_request_new', 'total_pending_request_new', 'permission_new', 'total_permission_new'));
    }
}
