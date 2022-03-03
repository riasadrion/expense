@extends('layouts.admin')
@section('content')
<div class="container">
    <h2 class="main-title">Expenses <a class="btn btn-success btn-sm" href="{{route('expenses.create')}}">Add new</a>
    </h2>
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
                    <th>Entertainment(Warehouse)</th>
                    <th>Stationery</th>
                    <th>Stationery(Warehouse)</th>
                    <th>Office Maintenance</th>
                    <th>Conveyance</th>
                    <th>Conveyance(Warehouse)</th>
                    <th>Gas Cylinder(Cook)</th>
                    <th>Dish Bill</th>
                    <th>Medicine</th>
                    <th>Medicine(Warehouse)</th>
                    <th>Accomodation/Guest room Expense</th>
                    <th>Employee Welfare/Celebration</th>
                    <th>Delivery Expense</th>
                    <th>Wages-Hire Labour</th>
                    <th>Store Material</th>
                    <th>Store Material(Warehouse)</th>
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
<link rel="stylesheet" type="text/css" href="{{url('/')}}/assets/css/datatables.css" />
@endpush

@push('scripts')
<script type="text/javascript" src="{{url('/')}}/assets/js/datatables.js"></script>
<script type="text/javascript">
    $(function () {

        var table = $('#yajra').DataTable({
            "scrollX": true,
            scrollY: '65vh',
            "lengthMenu": [[50, 100, 500, -1], [50, 100, 500, "All"]],
            processing: true,
            serverSide: true,
            dom: 'lBfrtip',
            buttons: [
                'copy', 'csv', 'excel'
            ],
            "ajax": {
                "url": "{{ route('expense.list') }}",
                "data": function (d) {
                    d.userType = "{{ Auth::user()->user_group_id }}";
                    // d.custom = $('#myInput').val();
                    // etc
                }
            },
            columns: [
                { data: 'DT_RowIndex', name: 'DT_RowIndex' },
                {
                    data: 'action',
                    name: 'action',
                    orderable: false,
                    searchable: false,
                },
                { data: 'date', name: 'date' },
                { data: 'total', name: 'total' },
                { data: 'office_meal', name: 'office_meal' },
                { data: 'entertainment', name: 'entertainment' },
                { data: 'entertainment_warehouse', name: 'entertainment_warehouse' },
                { data: 'stationery', name: 'stationery' },
                { data: 'stationery_warehouse', name: 'stationery_warehouse' },
                { data: 'maintenance', name: 'maintenance' },
                { data: 'conveyance', name: 'conveyance' },
                { data: 'conveyance_warehouse', name: 'conveyance_warehouse' },
                { data: 'gas_cylinder', name: 'gas_cylinder' },
                { data: 'dish_bill', name: 'dish_bill' },
                { data: 'medicine', name: 'medicine' },
                { data: 'medicine_warehouse', name: 'medicine_warehouse' },
                { data: 'accomodation', name: 'accomodation' },
                { data: 'welfare', name: 'welfare' },
                { data: 'delivery_expense', name: 'delivery_expense' },
                { data: 'labour_wage', name: 'labour_wage' },
                { data: 'store_material', name: 'store_material' },
                { data: 'store_material_warehouse', name: 'store_material_warehouse' },
                { data: 'transport', name: 'transport' },
                { data: 'fuel_oil', name: 'fuel_oil' },
                { data: 'vehicle_servicing', name: 'vehicle_servicing' },
                { data: 'toll_police_case', name: 'toll_police_case' },
            ]
        });

    });
</script>
@endpush