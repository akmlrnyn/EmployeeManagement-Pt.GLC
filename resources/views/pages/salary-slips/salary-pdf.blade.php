<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>

    <!-- PDF Style -->
    <style>
        .header-logo {
            margin-top: 5px;
            margin-bottom: 10px;
            margin-right: 10px;
            text-decoration: underline;
            display: flex;
            justify-content: center;
            width: 50px;
            height: 50px;
        }

        .container-header {
            margin-bottom: 20px;
        }

        .container-title-logo {
            display: flex;
        }

        .container-title {
            display: flex;
            justify-content: center;
            margin-top: 10px;
            margin-bottom: 4px;
        }

        .table-slip {
            border: 1px solid #ddd;
            border-collapse: collapse;
            width: 500px;
            margin: auto;

        }

        .header-table,
        .description-table {
            text-align: left;
            padding: 8px;
            border: 1px solid #ddd;
        }

        .header-table {
            background-color: #f2f2f2;
            font-weight: bold;
        }

        .row-table:nth-child(even) {
            background-color: #f9f9f9;
        }

    </style>
</head>

<body>

    <table class="">
        <tr>
            <td class="header-bodies">
                <img src="{{ 'img/logoputih.jpg' }}" alt="laravel daily" class="header-logo" />
            </td>
            <td class="header-bodies">
                <h2>PT. GLC Indonesia</h2>
            </td>
        </tr>
    </table>

    <div class="container-header">
        <table class="">
            <tr>
                <td class="">Mail: glc@glcmanning.co.id</td>
            </tr>
            <tr>
                <td class="">Tel: 021-21057959, 2105-7595</td>
            </tr>
            <tr>
                <td class="">Address: Rukan Avenue Jakarta Garden City kel Cakung Tim., <br>Kec. Cakung,
                    Kota Jakarta Timur, Daerah Khusus Ibukota Jakarta - 13910</td>
            </tr>
        </table>
    </div>

    <hr>

    <div class="">
        <h2 style="text-align: center; margin-top: 20px;">Salary Slip of {{$slips->month}}</h2>
    </div>

    <table class="table-slip">
            <tr class="row-table">
                <th class="header-table">Name</th>
                <td class="description-table">{{$slips->employee->name}}</td>
            </tr>
            <tr>
                <th class="header-table">Month</th>
                <td class="description-table">{{$slips->month}}</td>
            </tr>
            <tr>
                <th class="header-table">Gross Salary</th>
                <td class="description-table">Rp. {{$slips->employee->base_salary}},00</td>
            </tr>
            <tr>
                <th class="header-table">Leave Requests</th>
                <td class="description-table">{{$slips->leave_request}} times</td>
            </tr>
            <tr>
                <th class="header-table">Overtime</th>
                <td class="description-table">{{$slips->overtime}} times</td>
            </tr>
            <tr>
                <th class="header-table">Late</th>
                <td class="description-table">{{$slips->late}} times</td>
            </tr>
            <tr>
                <th class="header-table">Bonus</th>
                <td class="description-table">Rp. {{$slips->tax}},00</td>
            </tr>
            <tr>
                <th class="header-table">Deduction</th>
                <td class="description-table">Rp. {{$slips->tax}},00</td>
            </tr>
            <tr>
                <th class="header-table">Tax</th>
                <td class="description-table">Rp. {{$slips->tax}},00</td>
            </tr>
            <tr>
                <th class="header-table">BPJS</th>
                <td class="description-table">Rp. {{$slips->bpjs}},00</td>
            </tr>
            <tr>
                <th class="header-table">Salary Bonus</th>
                <td class="description-table">Rp. {{$slips->bonus}},00</td>
            </tr>
            <tr>
                <th class="header-table">Salary Deduction</th>
                <td class="description-table">Rp. {{$slips->deduction}},00</td>
            </tr>
            <tr>
                <th class="header-table">Net Salary</th>
                <td class="description-table">Rp. {{$slips->salary}},00</td>
            </tr>
    </table>
</body>

</html>
