<?php

namespace App\Http\Controllers;


use App\Models\Employee;
use App\Models\Permission;
use App\Models\PotonganBonus;
use App\Models\SalarySlip;
use Barryvdh\DomPDF\Facade\Pdf as FacadePdf;
use DateTime;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;

use function PHPUnit\Framework\isNull;

class SalarySlipsController extends Controller
{
    public function index() {
        $potongan_terlambat = PotonganBonus::all()->first();
        $bonus_overtime = PotonganBonus::all()->first();
        $slips = SalarySlip::simplePaginate(10);
        return view('pages.salary-slips.index', compact('slips', 'potongan_terlambat', 'bonus_overtime'));
    }

    public function store(Request $request) {
        $data = $request->except(['_token']);
        $potongan_terlambat = PotonganBonus::all()->first();
        $bonus_overtime = PotonganBonus::all()->first();
        $late = Permission::all()->count();
       

        $total_potongan_terlambat = $late  * $potongan_terlambat['potongan_terlambat'];
        $total_bonus_overtime = $request['overtime'] * $bonus_overtime['bonus_overtime'];

        $gaji_bersih = $request['salary'] 
        - $total_potongan_terlambat 
        + $total_bonus_overtime 
        - $request['deduction'] 
        + $request['bonus'];


        $data['salary'] = $gaji_bersih;
        SalarySlip::create($data);


        return redirect()->route('salary-slips.index')->withInput();
    }

    public function show($id) {
        $slip = SalarySlip::find($id);
        $now = new DateTime();
        $currentMonth = $now->format('F');
        $permission = $slip->employee->permission->where('month', $currentMonth)->count();

        return view('pages.salary-slips.show', compact('slip', 'currentMonth', 'permission'));
    }

    public function create() {
        $staffs = Employee::whereDoesntHave('salary_slip')->get();

        return view('pages.salary-slips.create', compact('staffs'));
    }

    public function create_form($id) {
        $currentMonth = Carbon::now()->format('F');
        $staff = Employee::findOrFail($id);
        $leaveRequest = 12 - $staff->leave_request_left;
        $late = Permission::all()->count();

        return view('pages.salary-slips.create-form', compact('staff', 'currentMonth', 'leaveRequest', 'late'));
    }

    public function edit ($id) {
        $slip = SalarySlip::find($id);

        $now = new DateTime();
        $currentMonth = $now->format('F');
        $late = Permission::all()->count();

        return view('pages.salary-slips.edit-form', compact('slip', 'currentMonth', 'late')); 
    }

    public function update (Request $request, $id) {
        $data = $request->all();
        $slip = SalarySlip::findOrFail($id);
        $potongan_terlambat = PotonganBonus::all()->first();
        $bonus_overtime = PotonganBonus::all()->first();
        $late = Permission::all()->count();
       

        $total_potongan_terlambat = $late * $potongan_terlambat['potongan_terlambat'];
        $total_bonus_overtime = $request['overtime'] * $bonus_overtime['bonus_overtime'];

        $gaji_bersih = $request['salary'] 
        - $total_potongan_terlambat 
        + $total_bonus_overtime 
        - $request['deduction'] 
        + $request['bonus'];

        $data['salary'] = $gaji_bersih;
        $slip->update($data);
        return redirect()->route('salary-slips.index');
    }

    public function print_pdf($id) {
        $slips = SalarySlip::find($id);
        $currentMonth = Carbon::now()->format('F');
        $staff_permit = Permission::where([['employee_id', $slips->employee->id],['month', $currentMonth], ['status', 'accepted']])->count();
        $pdf = FacadePdf::loadView('pages.salary-slips.salary-pdf', ['slips' => $slips, 'staff_permit' => $staff_permit]);
        
        return $pdf->download($slips->employee->name.'_'.$slips->month. '.pdf');
    }
}
