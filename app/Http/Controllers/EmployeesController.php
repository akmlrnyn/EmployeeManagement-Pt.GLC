<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreEmployeeRequest;
use App\Http\Requests\UpdateEmployeeRequest;
use App\Models\User;
use App\Models\Employee;
use App\Models\LeaveRequest;
use Illuminate\Http\Request;

class EmployeesController extends Controller
{
    public function index() {
        $employees = Employee::all();
        return view('pages.employee.index', compact('employees'));
    }

    public function create() {
        $user = User::whereDoesntHave('employee')->get();
        return view('pages.employee.create-employee', compact('user'));
    }

    public function store(StoreEmployeeRequest $request) {
        $validated = $request->validated();
        Employee::create($validated);
        return redirect()->route('employees.index');
    }

    public function show($id) {
        $employee = Employee::find($id);
        return view('pages.employee.show', compact('employee')); 
    }

    public function destroy($id){
        $employee = Employee::find($id);
        $employee->delete();
        return back();
    }

    public function edit($id) {
        $staff = Employee::findOrFail($id);
        return view('pages.employee.edit', compact('staff'));
    }

    public function update(UpdateEmployeeRequest $request, $id) {
        $validated = $request->validated();
        $staff = Employee::findOrFail($id);
        
        $staff->update($validated);
        return redirect()->route('employees.index');
    }
}
