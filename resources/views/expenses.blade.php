@extends('layouts.admin')
@section('content')
<div class="container">
    <h2 class="main-title">Expenses</h2>
    <div class="row stat-cards overflow-hidden">
        <table id="yajra" class="display nowrap" style="width:100%">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Action</th>
                    <th>Date</th>
                    <th>Total</th>
                    <th>Office Meal</th>
                    <th>Entertainment</th>
                    <th>Stationery</th>
                    <th>Office Maintenance</th>
                    <th>Conveyance</th>
                    <th>Gas Cylinder(Cook)</th>
                    <th>Dish Bill</th>
                    <th>Medicine</th>
                    <th>Accomodation/Guest room Expense</th>
                    <th>Employee Welfare/Celebration</th>
                    <th>Delivery Expense</th>
                    <th>Wages-Hire Labour</th>
                    <th>Store Material</th>
                    <th>Truck Fare/Transport</th>
                    <th>Fuel oil & Gas</th>
                    <th>Vehicle Servicing</th>
                    <th>Toll/Ferry & Police Case</th>
                </tr>
            </thead>
            <tbody>
            </tbody>
        </table>
    </div>
</div>
@endsection

@push('css')
<link rel="stylesheet" type="text/css"
    href="https://cdn.datatables.net/v/dt/jq-3.6.0/jszip-2.5.0/dt-1.11.4/b-2.2.2/b-colvis-2.2.2/b-html5-2.2.2/b-print-2.2.2/date-1.1.2/r-2.2.9/sc-2.0.5/sp-1.4.0/datatables.min.css" />
@endpush

@push('scripts')
<script type="text/javascript"
    src="https://cdn.datatables.net/v/dt/jq-3.6.0/jszip-2.5.0/dt-1.11.4/b-2.2.2/b-colvis-2.2.2/b-html5-2.2.2/b-print-2.2.2/date-1.1.2/r-2.2.9/sc-2.0.5/sp-1.4.0/datatables.min.js"></script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.36/pdfmake.min.js"></script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.36/vfs_fonts.js"></script>
<script type="text/javascript">
    $(function () {

        var table = $('#yajra').DataTable({
            "scrollX": true,
            scrollY: '50vh',
            "lengthMenu": [[50, 100, 500, -1], [50, 100, 500, "All"]],
            processing: true,
            serverSide: true,
            dom: 'lBfrtip',
            buttons: [
                'copy', 'csv', 'excel'
            ],
            ajax: "{{ route('expense.list') }}",
            columns: [
                { data: 'DT_RowIndex', name: 'DT_RowIndex' },
                {
                    data: 'action',
                    name: 'action',
                    orderable: false,
                    searchable: false,
                },
                { data: 'created_at', name: 'created_at' },
                { data: 'total', name: 'total' },
                { data: 'office_meal', name: 'office_meal' },
                { data: 'entertainment', name: 'entertainment' },
                { data: 'stationery', name: 'stationery' },
                { data: 'maintenance', name: 'maintenance' },
                { data: 'conveyance', name: 'conveyance' },
                { data: 'gas_cylinder', name: 'gas_cylinder' },
                { data: 'dish_bill', name: 'dish_bill' },
                { data: 'medicine', name: 'medicine' },
                { data: 'accomodation', name: 'accomodation' },
                { data: 'welfare', name: 'welfare' },
                { data: 'delivery_expense', name: 'delivery_expense' },
                { data: 'labour_wage', name: 'labour_wage' },
                { data: 'store_material', name: 'store_material' },
                { data: 'transport', name: 'transport' },
                { data: 'fuel_oil', name: 'fuel_oil' },
                { data: 'vehicle_servicing', name: 'vehicle_servicing' },
                { data: 'toll_police_case', name: 'toll_police_case' },
            ]
        });

    });
</script>
@endpush