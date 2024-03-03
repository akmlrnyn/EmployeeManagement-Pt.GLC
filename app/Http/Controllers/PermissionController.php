<?php

namespace App\Http\Controllers;

use App\Models\Employee;
use App\Models\Permission;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;

class PermissionController extends Controller
{
    public function index() {
        $permission = Permission::all()->where('status', 'pending');
        $permission_accepted = Permission::all()->where('status', 'accepted');
        $permission_rejected = Permission::all()->where('status', 'rejected');
        return view('pages.permission.index', compact('permission', 'permission_accepted', 'permission_rejected'));
    }

    public function create() {
        $employee = Employee::all();
        return view('pages.permission.create', compact('employee'));
    }

    public function create_form($id){
        $employee = Employee::find($id);
        return view('pages.permission.create-form', compact('employee'));
        
    }
    
    public function store($id, Request $request){
        $data = $request->all();
        $employee = Employee::find($id);
        $currentMonth = Carbon::now()->format('F');

        $data['status'] = 'accepted';
        $data['month'] = $currentMonth;

        $qpaScore = $employee->qpa;
        $qpaScore -= $request['qpa'];
        $employee->update([
            'qpa' => $qpaScore
        ]);

        Permission::create($data);
        return redirect()->route('permission.index');
    }

    public function check($id, Request $request) {
        $data = $request->input('status');
        $permission = Permission::find($id);
        $employee = Employee::find($permission->employee_id);
        $qpaScore = $employee->qpa;

        if ($data == 'accepted') {
            $permission->update([
            'status' => 'accepted'
            ]);
            $qpaScore -= 3;
            $employee->update([
                'qpa' => $qpaScore
            ]);
        } else {
            $permission->update([
                'status' => 'rejected'
            ]);
        }
        return back();
    }

    public function delete(){
        $permissions = Permission::whereIn('status', ['accepted', 'rejected'])->delete();
        return back();
    }
}
