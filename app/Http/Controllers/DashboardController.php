<?php

namespace App\Http\Controllers;

use App\Models\Employee;
use App\Models\LeaveRequest;
use App\Models\Permission;
use Illuminate\Support\Facades\Artisan;

class DashboardController extends Controller
{
    public function index() {
        $total_employee = Employee::all()->count();
        $pending_request_new = LeaveRequest::take(2)->where('status', 'pending')->get();
        $permission_new = Permission::take(2)->where('status', 'pending')->get();
        $total_pending_request_new = LeaveRequest::where('status', 'pending')->count();
        $total_permission_new = Permission::where('status', 'pending')->count();
        
        return view('dashboard',compact('total_employee', 'pending_request_new', 'total_pending_request_new', 'permission_new', 'total_permission_new'));
    }

    public function ccCache()
    {
        Artisan::call('cache:clear');
        return redirect()->back()->withSuccess('Cache Cleared!');
    }

    public function qpa() {
        return view('pages.qpa.index');
    }
}
