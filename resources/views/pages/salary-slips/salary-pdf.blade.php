<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>

    <!-- PDF Style -->
    <style>
        .logo-title {
            margin-top: 10px;
            margin-bottom: 10px;
            text-decoration: underline;
            display: flex;
            justify-content: center;
        }

        .container-title {
            display: flex;
            justify-content: center;
            margin-top: 10px;
            margin-bottom: 10px;
        }

        .table-pdf {
            border: 1px solid #ddd;
            /* Add a thin border */
            border-collapse: collapse;
            /* Remove gaps between cells */
        }

        .header-table,
        .description-table {
            text-align: left;
            /* Align content left by default */
            padding: 8px;
            /* Add some padding for readability */
            border: 1px solid #ddd;
            /* Add borders to each cell */
        }

        .header-table {
            background-color: #f2f2f2;
            /* Light background for headers */
            font-weight: bold;
            /* Bold text for headers */
        }

        .row-table:nth-child(even) {
            background-color: #f9f9f9;
            /* Alternate row colors for readability */
        }

    </style>
</head>

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

</html>
