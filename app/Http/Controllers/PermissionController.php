<?php

namespace App\Http\Controllers;

use App\Models\Employee;
use App\Models\Permission;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;

class PermissionController extends Controller
{
    public function create($id) {
        $currentMonth = Carbon::now()->format('F');
        $employee = Employee::find($id);
        return view('pages.permission.create-form', compact('employee', 'currentMonth'));
    }

    public function store($id, Request $request){
        $data = $request->all();
        $employee = Employee::find($id);
        $qpaScore = $employee->qpa;

        $qpaScore -= $request['qpa'];

        $employee->update([
            'qpa' => $qpaScore
        ]);

        Permission::create($data);
        return redirect()->route('employee.detail', $id);
    }
}
