<?php

namespace App\Http\Controllers;

use App\Models\Employee;
use App\Models\LeaveRequest;
use Illuminate\Http\Request;

class LeaveRequestController extends Controller
{
    public function index() {
        $leave_request = LeaveRequest::all()->where('status', 'pending');
        $leave_request_amount = $leave_request->count();
        $accepted_leave_request = LeaveRequest::all()->where('status', 'accepted');
        $rejected_leave_request = LeaveRequest::all()->where('status', 'rejected');
        return view('pages.leaverequest.index', compact('leave_request', 'accepted_leave_request', 'leave_request_amount', 'rejected_leave_request'));
    }

    public function check($id) {
        $leave_request = LeaveRequest::findOrFail($id);
        $leave_request->update([
            'status' => 'accepted'
        ]);

        $employee = Employee::findOrFail($leave_request->employee_id);
        $leave_request_left = $employee->leave_request_left - $leave_request->amount_of_days;
        $employee->update([
            'leave_request_left' => $leave_request_left 
        ]);

        return redirect()->route('leaverequest.index');
    }

    public function reject($id) {
        $leave_request = LeaveRequest::findOrFail($id);
        $leave_request->update([
            'status' => 'rejected'
        ]);
        return redirect()->route('leaverequest.index');

    }

    public function reset() {
        $employee = Employee::all();
        $employee->update([
            'leave_request_left' => 12
        ]);
        return redirect()->route('leaverequest.index');
    }
}
