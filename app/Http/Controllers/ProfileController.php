<?php

namespace App\Http\Controllers;

use App\Models\Employee;
use App\Models\LeaveRequest;
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
}
