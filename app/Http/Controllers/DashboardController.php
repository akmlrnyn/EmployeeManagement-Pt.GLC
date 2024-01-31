<?php

namespace App\Http\Controllers;

use App\Models\Employee;
use App\Models\LeaveRequest;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index() {
        $total_employee = Employee::all()->count();
        $pending_request_new = LeaveRequest::take(3)->where('status', 'pending')->get();
        $total_pending_request_new = LeaveRequest::where('status', 'pending')->count();
        
        return view('dashboard',compact('total_employee', 'pending_request_new', 'total_pending_request_new'));
    }
}
