<?php

namespace App\Http\Controllers;

use App\Models\Employee;
use App\Models\LeaveRequest;
use App\Models\Permission;
use App\Models\SalarySlip;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProfileController extends Controller
{
    public function index() {
        $user = Auth::user();
        return view('user.index', compact('user'));
    }

    public function leave_request() {
        return view('user.leave_requests.create');
    }
    public function leave_request_create(Request $request) {
        $data = $request->all();
        LeaveRequest::create($data);

        return redirect()->route('profile.index');
    }
    public function leave_request_show() {
        $leave_requests = LeaveRequest::all()->where('employee_id', Auth::user()->employee->id);
        $leave_requests_total = $leave_requests->count();
        return view('user.leave_requests.show', compact('leave_requests', 'leave_requests_total'));
    }

    public function salary_slip() {
        $slips = SalarySlip::where('employee_id', Auth::user()->employee->id)->get();
        return view('user.salary_slip.index', compact('slips'));
    }

    public function permission() {
        return view('user.permission.create');
    }

    public function permission_create(Request $request) {
        $data = $request->all();
        Permission::create($data);
        return redirect()->route('profile.index');
    }

    public function permission_show() {
        $permission = Permission::all()->where('employee_id', Auth::user()->employee->id);
        return view('user.permission.show', compact('permission'));
    }
}
