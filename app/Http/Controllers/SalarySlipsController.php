<?php

namespace App\Http\Controllers;

use App\Models\Employee;
use App\Models\SalarySlip;
use Illuminate\Http\Request;

class SalarySlipsController extends Controller
{
    public function index() {
        $slips = SalarySlip::all();
        return view('pages.salary-slips', compact('slips'));
    }

    public function store(Request $request) {
        $data = $request->except(['_token']);
        SalarySlip::create($data);

        return redirect('/employees');
    }

    public function show($id) {
        $slip = SalarySlip::find($id);

        return view('pages.detail', compact('slip'));
    }
}
