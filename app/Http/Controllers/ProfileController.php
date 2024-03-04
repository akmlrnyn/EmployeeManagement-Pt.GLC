<?php

namespace App\Http\Controllers;

use App\Models\LeaveRequest;
use App\Models\Permission;
use App\Models\SalarySlip;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
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
        $slip = SalarySlip::with('employee.permission')->where('employee_id', Auth::user()->employee->id)->first();

        if ($slip) {
            $permission = $slip->employee->permission->where('month', Carbon::now()->format('F'))->count();
            return view('user.salary_slip.index', compact('slip', 'permission'));
        }

        return view('user.salary_slip.index', compact('slip'));
    }

    public function permission() {
        return view('user.permission.create');
    }

    public function permission_create(Request $request) {
        $data = $request->all();
        $currentMonth = Carbon::now()->format('F');
        $data['qpa'] = 3;
        $data['month'] = $currentMonth;
        Permission::create($data);
        return redirect()->route('profile.index');
    }

    public function permission_show() {
        $permission = Permission::all()->where('employee_id', Auth::user()->employee->id);
        return view('user.permission.show', compact('permission'));
    }

    public function qpa() {
        $qpa = Auth::user()->employee->qpa;
        return view('user.qpa.index', compact('qpa'));
    }
}
