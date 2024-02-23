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
        $staffs = Employee::all();
        $total_staff = $staffs->count();

        if ($total_staff === 0) {
            return view('pages.qpa.index', compact('staffs', 'total_staff'));
        } else {
        
        // devide grade
        $great_grades = Employee::where('qpa', '>=', 90)->count();
        $bad_grades = Employee::where('qpa', '<', 70)->count();

        //average
        $average = (($staffs->sum('qpa')) / $total_staff);

        //percentage
        $percentage_great = ($great_grades / $total_staff) * 100;
        $percentage_bad = ($bad_grades / $total_staff) * 100;

        }

        return view('pages.qpa.index', compact('staffs', 'total_staff', 'great_grades', 'bad_grades', 'percentage_great', 'percentage_bad', 'average'));
    }
}
