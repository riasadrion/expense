<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Daily Expense</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.1.3/dist/css/bootstrap.min.css">
    <style>
        @media print {

            /* body * {
                visibility: hidden;
            } */
            .non-printable {
                visibility: hidden;
            }

            #section-to-print,
            #section-to-print * {
                visibility: visible;
            }

            #section-to-print {
                position: absolute;
                left: 0;
                top: 20;
            }
        }
    </style>
</head>

<body>
    <div class="container">
        <div class="row non-printable py-2">
            <button class="btn btn-primary mr-3" onclick="window.print()">Print</button> <a class="btn btn-success"
                href="{{ route('report') }}">Go
                back</a>
        </div>
        <div id=section-to-print">
            <h2>Daily Expense Report ({{ Carbon\Carbon::parse($from)->format('d/m/Y')}} - {{
                Carbon\Carbon::parse($to)->format('d/m/Y')}})</h2><br>
            <div class="row">
                <div class="col">
                    <h4>Admin Expense</h4>
                    <table class="table table-bordered table-striped">
                        <tbody>
                            <tr>
                                <td>Office Meal</td>
                                <td>{{ $data->office_meal }}</td>
                            </tr>
                            <tr>
                                <td>Entertainment</td>
                                <td>{{ $data->entertainment }}</td>
                            </tr>
                            <tr>
                                <td>Stationery</td>
                                <td>{{ $data->stationery }}</td>
                            </tr>
                            <tr>
                                <td>Office Maintenance</td>
                                <td>{{ $data->maintenance }}</td>
                            </tr>
                            <tr>
                                <td>Mobile Bill</td>
                                <td>{{ $data->mobile_bill }}</td>
                            </tr>
                            <tr>
                                <td>Import Permit Expenses</td>
                                <td>{{ $data->import_permit }}</td>
                            </tr>
                            <tr>
                                <td>Tips</td>
                                <td>{{ $data->tips }}</td>
                            </tr>
                            <tr>
                                <td>Conveyance</td>
                                <td>{{ $data->conveyance }}</td>
                            </tr>
                            <tr>
                                <td>Gas Cylinder(Cook)</td>
                                <td>{{ $data->gas_cylinder }}</td>
                            </tr>
                            <tr>
                                <td>Dish Bill</td>
                                <td>{{ $data->dish_bill }}</td>
                            </tr>
                            <tr>
                                <td>Medicine</td>
                                <td>{{ $data->medicine }}</td>
                            </tr>
                            <tr>
                                <td>Accomodation/Guest room Expense</td>
                                <td>{{ $data->accomodation }}</td>
                            </tr>
                            <tr>
                                <td>Employee Welfare/Celebration</td>
                                <td>{{ $data->welfare }}</td>
                            </tr>
                            <tr>
                                <td>Store Material</td>
                                <td>{{ $data->store_material }}</td>
                            </tr>
                            <tr>
                                <td>Truck Fare/Transport</td>
                                <td>{{ $data->transport }}</td>
                            </tr>
                            <tr>
                                <td>Fuel oil & Gas</td>
                                <td>{{ $data->fuel_oil }}</td>
                            </tr>
                            <tr>
                                <td>Vehicle Servicing</td>
                                <td>{{ $data->vehicle_servicing }}</td>
                            </tr>
                            <tr>
                                <td>Toll/Ferry & Police Case</td>
                                <td>{{ $data->toll_police_case }}</td>
                            </tr>
                            <tr>
                                <td>Legal Fees</td>
                                <td>{{ $data->legal_fees }}</td>
                            </tr>
                            <tr>
                                <td>Donation</td>
                                <td>{{ $data->donation }}</td>
                            </tr>
                            <tr>
                                <td>IT Accessories</td>
                                <td>{{ $data->it_accessories }}</td>
                            </tr>
                            <tr>
                                <td>Parking Bill</td>
                                <td>{{ $data->parking_bill }}</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
                <div class="col">
                    <h4>Warehouse expense</h4>
                    <table class="table table-bordered table-striped">
                        <tbody>
                            <tr>
                                <td>Entertainment</td>
                                <td>{{ $data->entertainment_warehouse }}</td>
                            </tr>
                            <tr>
                                <td>Stationery</td>
                                <td>{{ $data->stationery_warehouse }}</td>
                            </tr>
                            <tr>
                                <td>Conveyance</td>
                                <td>{{ $data->conveyance_warehouse }}</td>
                            </tr>
                            <tr>
                                <td>Delivery Expense</td>
                                <td>{{ $data->delivery_expense }}</td>
                            </tr>
                            <tr>
                                <td>Wages-Hire Labour</td>
                                <td>{{ $data->labour_wage }}</td>
                            </tr>
                            <tr>
                                <td>Medicine</td>
                                <td>{{ $data->medicine_warehouse }}</td>
                            </tr>
                            <tr>
                                <td>Store Material</td>
                                <td>{{ $data->store_material_warehouse }}</td>
                            </tr>
                            <tr>
                                <td>Maintenance</td>
                                <td>{{ $data->maintenance_warehouse }}</td>
                            </tr>
                        </tbody>
                    </table>
                    <h3>Total expense: {{ $data->total }}</h3>
                </div>
            </div>
        </div>
    </div>
</body>

</html>