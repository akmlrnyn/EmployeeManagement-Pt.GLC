<?php

namespace App\Http\Controllers;

use App\Models\Employee;
use App\Models\User;
use Illuminate\Http\Request;

class EmployeesController extends Controller
{
    public function index() {
        $employees = Employee::all();
        return view('pages.employee.index', compact('employees'));
    }

    public function create() {
        $user = User::all();
        return view('pages.employee.create-employee', compact('user'));
    }

    public function store(Request $request) {
        $input = $request->all();   
        Employee::create($input);
        return redirect()->route('employees.index');
    }

    public function show($id) {
        $employee = Employee::find($id);
        return view('pages.employee.detail-employee', compact('employee')); 
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
