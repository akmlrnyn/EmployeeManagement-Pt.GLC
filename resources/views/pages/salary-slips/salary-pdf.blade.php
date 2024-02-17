@section('pdf')

<body>
    <div class="container-title">
        <div class="">
            <img src="{{ 'img/logo_company.png' }}" alt="" class="logo-title" height="100px" width="100px">
            <h5> SALARY SLIP KARYAWAN
            </h5>
        </div>
    </div>

    <table class="table-pdf">
        <thead>
            <tr class="row-table">
                <th class="header-table">Name</th>
                <th class="header-table">Month</th>
                <th class="header-table">Gross Salary</th>
                <th class="header-table">Leave Requests</th>
                <th class="header-table">Overtime</th>
                <th class="header-table">Late</th>
                <th class="header-table">Tax</th>
                <th class="header-table">BPJS</th>
                <th class="header-table">Net Salary</th>
            </tr>
        </thead>
        <tbody>
            <tr class="row-table">
                <td class="description-table">{{$slips->employee->name}}</td>
                <td class="description-table">{{$slips->month}}</td>
                <td class="description-table">Rp. {{$slips->employee->base_salary}},00</td>
                <td class="description-table">{{$slips->leave_request}}</td>
                <td class="description-table">{{$slips->overtime}}</td>
                <td class="description-table">{{$slips->late}}</td>
                <td class="description-table">Rp. {{$slips->tax}},00</td>
                <td class="description-table">Rp. {{$slips->bpjs}},00</td>
                <td class="description-table">Rp. {{$slips->salary}},00</td>
            </tr>
        </tbody>
    </table>

</body>

