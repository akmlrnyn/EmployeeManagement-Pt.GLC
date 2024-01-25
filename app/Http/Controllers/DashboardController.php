<?php

namespace App\Http\Controllers;

use App\Models\Employee;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index() {
        $total_employee = Employee::all()->count();
        
        return view('dashboard',compact('total_employee'));
    }
}
