<?php

namespace App\Http\Controllers;

use App\Models\Employee;
use App\Models\SalarySlip;
use Illuminate\Http\Request;

class SalarySlipsController extends Controller
{
    public function index() {
        $slips = SalarySlip::all();
        return view('pages.salary-slips.index', compact('slips'));
    }

    public function store(Request $request) {
        $data = $request->except(['_token']);
        SalarySlip::create($data);

        return redirect()->route('salary-slips.index');
    }

    public function show($id) {
        $slip = SalarySlip::find($id);

        return view('pages.salary-slips.show', compact('slip'));
    }

    public function create() {
        $staffs = Employee::all();
        return view('pages.salary-slips.create', compact('staffs'));
    }

    public function create_form($id) {
        $staff = Employee::findOrFail($id);
        return view('pages.salary-slips.create-form', compact('staff'));
    }
}
