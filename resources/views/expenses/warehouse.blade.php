@extends('layouts.admin')
@section('content')
<div class="container">
    <h2 class="main-title">Warehouse Expenses @if(Auth::user()->user_group_id != 3)<a class="btn btn-success btn-sm"
            href="{{route('create.warehouse.expense')}}">Add new</a>@endif
    </h2>
    <div class="row stat-cards overflow-hidden">
        <table id="yajra" class="display nowrap" style="width:100%">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Action</th>
                    <th>Date</th>
                    <th>Total</th>
                    <th>Entertainment</th>
                    <th>Stationery</th>
                    <th>Conveyance</th>
                    <th>Delivery Expense</th>
                    <th>Wages-Hire Labour</th>
                    <th>Medicine</th>
                    <th>Store Material</th>
                    <th>Maintenance</th>
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
                'copy', 'csv', 'excel', 'print'
            ],
            "ajax": {
                "url": "{{ route('warehouse.list') }}",
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
                { data: 'entertainment_warehouse', name: 'entertainment_warehouse' },
                { data: 'stationery_warehouse', name: 'stationery_warehouse' },
                { data: 'conveyance_warehouse', name: 'conveyance_warehouse' },
                { data: 'delivery_expense', name: 'delivery_expense' },
                { data: 'labour_wage', name: 'labour_wage' },
                { data: 'medicine_warehouse', name: 'medicine_warehouse' },
                { data: 'store_material_warehouse', name: 'store_material_warehouse' },
                { data: 'maintenance_warehouse', name: 'maintenance_warehouse' },
            ]
        });

    });
</script>
@endpush