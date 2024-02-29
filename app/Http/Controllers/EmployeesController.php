<?php

namespace App\Http\Controllers;

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

    public function store(Request $request) {

        $request->validate([
            'user_id' => 'required|unique:employees,user_id',
            'name' => 'required|unique:employees,name',
            'phone' => 'required',
            'position' => 'required',
            'base_salary' => 'required|integer',
        ]);

        $input = $request->all();   
        Employee::create($input);
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

    public function update(Request $request, $id) {
        $data = $request->all();
        $staff = Employee::findOrFail($id);
        $staff->update($data);
        return redirect()->route('employees.index');
    }
}
