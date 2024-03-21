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

class SalarySlipsController extends Controller
{
    public function index() {
        $potongan_terlambat = PotonganBonus::all()->first();
        $bonus_overtime = PotonganBonus::all()->first();
        $slips = SalarySlip::all();
        return view('pages.salary-slips.index', compact('slips', 'potongan_terlambat', 'bonus_overtime'));
    }

    public function store(Request $request) {
        $data = $request->except(['_token']);
        $currentMonth = Carbon::now()->format('F');
        $potongan_terlambat = PotonganBonus::all()->first();
        $bonus_overtime = PotonganBonus::all()->first();
       

        $total_potongan_terlambat = $request['late']  * $potongan_terlambat['potongan_terlambat'];
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
        $late = Permission::where([['employee_id', $staff->id], ['month', $currentMonth], ['status', 'accepted']])->count();

        return view('pages.salary-slips.create-form', compact('staff', 'currentMonth', 'leaveRequest', 'late'));
    }

    public function edit ($id) {
        $slip = SalarySlip::find($id);

        $now = new DateTime();
        $currentMonth = $now->format('F');

        return view('pages.salary-slips.edit-form', compact('slip', 'currentMonth')); 
    }

    public function update (Request $request, $id) {
        $data = $request->all();
        $currentMonth = Carbon::now()->format('F');
        $slip = SalarySlip::findOrFail($id);
        $employee = Employee::where('id', $slip->employee_id);
        $potongan_terlambat = PotonganBonus::all()->first();
        $bonus_overtime = PotonganBonus::all()->first();
       

        $total_potongan_terlambat = $request['late'] * $potongan_terlambat['potongan_terlambat'];
        $total_bonus_overtime = $request['overtime'] * $bonus_overtime['bonus_overtime'];

        $gaji_bersih = $request['salary'] 
        - $total_potongan_terlambat 
        + $total_bonus_overtime 
        - $request['deduction'] 
        + $request['bonus'];

        $data['salary'] = $gaji_bersih;
        $slip->update($data);
        $employee->update([
            'qpa' => 100
        ]);
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
