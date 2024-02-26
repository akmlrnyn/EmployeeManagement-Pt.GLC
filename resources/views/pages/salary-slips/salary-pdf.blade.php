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
            margin-bottom: 10px;
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
            margin-bottom: 1rem;
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

        .additional-info{
            margin: 0 auto;
            width: 570px;
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
        <h2 style="text-align: center; margin-top: 10px;">Salary Slip of {{$slips->month}}</h2>
        <p style="text-align: center">{{ date('d M Y', strtotime($slips->created_at)) }}</p>
    </div>

    <table class="table-slip">
            <tr class="row-table">
                <th class="header-table">Information</th>
                <th class="header-table">Details</th>
            </tr>
            <tr>
                <th class="description-table">Name</th>
                <td class="description-table">{{$slips->employee->name}}</td>
            </tr>
            <tr>
                <th class="description-table">Position</th>
                <td class="description-table">{{$slips->employee->position}}</td>
            </tr>
            <tr>
                <th class="description-table">Month</th>
                <td class="description-table">{{$slips->month}}</td>
            </tr>
    </table>
    <table class="table-slip">
            <tr>
                <th class="header-table">Salary Details</th>
                <th class="header-table">Amount</th>
            </tr>
            <tr>
                <th class="description-table">Gross Salary</th>
                <td class="description-table">Rp. {{number_format($slips->employee->base_salary)}},00</td>
            </tr>
            <tr>
                <th class="description-table">Overtime</th>
                <td class="description-table">{{$slips->overtime}} hours</td>
            </tr>
            <tr>
                <th class="description-table">Bonus</th>
                <td class="description-table">Rp. {{number_format($slips->bonus)}},00</td>
            </tr>
            <tr>
                <th class="description-table">Late</th>
                <td class="description-table">{{$slips->late}} times</td>
            </tr>
            <tr>
                <th class="description-table">Deduction</th>
                <td class="description-table">Rp. {{number_format($slips->deduction)}},00</td>
            </tr>
            <tr>
                <th class="description-table">Tax</th>
                <td class="description-table">Rp. {{number_format($slips->tax)}},00</td>
            </tr>
            <tr>
                <th class="description-table">BPJS</th>
                <td class="description-table">Rp. {{number_format($slips->bpjs)}},00</td>
            </tr>
            <tr>
                <th class="description-table">Net Salary</th>
                <td class="description-table">Rp. {{number_format($slips->salary)}},00</td>
            </tr>
    </table>
    <table class="table-slip">
            <tr>
                <th class="header-table">QPA Details</th>
                <th class="header-table">Amount</th>
            </tr>
            <tr>
                <th class="description-table">Permissions</th>
                <td class="description-table">{{ $staff_permit }}</td>
            </tr>
            <tr>
                <th class="description-table">QPA Score</th>
                <td class="description-table">{{ $slips->employee->qpa }}</td>
            </tr>
    </table>
    <div class="additional-info">
        <p>
            Additional Information: Late deductions are calculated per day and overtime is calculated per hour.
            Then all BPJS and taxes are borne by the company
        </p>
        <p>
            Quality Practice Accreditation: Make sure that your QPA is in the good predicate, you'll get bad predicate when your QPA is under 69
        </p>
    </div>
</body>

</html>
