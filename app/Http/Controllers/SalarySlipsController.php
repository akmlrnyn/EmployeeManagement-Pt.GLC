<?php

namespace App\Http\Controllers;

use App\Models\Employee;
use App\Models\SalarySlip;
use Illuminate\Http\Request;

class SalarySlipsController extends Controller
{
    public function index() {
        $slips = SalarySlip::all();
        $employees = Employee::all();

        return view('pages.salary-slips.index', compact('slips', 'employees'));
    }

    public function store(Request $request) {
        $data = $request->except(['_token']);
        SalarySlip::create($data);

        return redirect('/employees');
    }

    public function show($id) {
        $slip = SalarySlip::find($id);

        return view('pages.salary-slips.show', compact('slip'));
    }
}
