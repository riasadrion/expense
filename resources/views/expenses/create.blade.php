@extends('layouts.admin')
@section('content')
<div class="container">
    <h2 class="main-title">Add new expense</h2>
    <div class="row stat-cards">
        <div class="card col-12">
            <div class="card-body">
                <form method="POST" action="{{route('expenses.store')}}">
                    @csrf
                    <div class="row">

                        <div class="form-group col-4">
                            <label class="mr-2 font-weight-bold">Total</label>
                            <input class="total form-control font-weight-bold" disabled>
                        </div>
                    </div>
                    <div class="row">
                        <div class="form-group col-4">
                            <label>Date</label>
                            <input name="date" class="datepicker form-control">
                        </div>
                        <div class="form-group col">
                            <label>Office Meal</label>
                            <input type="number" class="form-control sum" id="office_meal" name="office_meal">
                        </div>
                        <div class="form-group col">
                            <label>Entertainment</label>
                            <input type="number" class="form-control sum" id="entertainment" name="entertainment">
                        </div>
                        <div class="form-group col">
                            <label>Entertainment(Warehouse)</label>
                            <input type="number" class="form-control sum" id="entertainment_warehouse"
                                name="entertainment_warehouse">
                        </div>
                    </div>
                    <div class="row">
                        <div class="form-group col">
                            <label>Stationery</label>
                            <input type="number" class="form-control sum" id="stationery" name="stationery">
                        </div>
                        <div class="form-group col">
                            <label>Stationery(Warehouse)</label>
                            <input type="number" class="form-control sum" id="stationery_warehouse"
                                name="stationery_warehouse">
                        </div>
                        <div class="form-group col">
                            <label>Office Maintenance</label>
                            <input type="number" class="form-control sum" id="maintenance" name="maintenance">
                        </div>
                    </div>
                    <div class="row">
                        <div class="form-group col">
                            <label>Conveyance</label>
                            <input type="number" class="form-control sum" id="conveyance" name="conveyance">
                        </div>
                        <div class="form-group col">
                            <label>Conveyance(Warehouse)</label>
                            <input type="number" class="form-control sum" id="conveyance_warehouse"
                                name="conveyance_warehouse">
                        </div>
                        <div class="form-group col">
                            <label>Gas Cylinder(Cook)</label>
                            <input type="number" class="form-control sum" id="gas_cylinder" name="gas_cylinder">
                        </div>
                        <div class="form-group col">
                            <label>Dish Bill</label>
                            <input type="number" class="form-control sum" id="dish_bill" name="dish_bill">
                        </div>
                    </div>
                    <div class="row">
                        <div class="form-group col">
                            <label>Medicine</label>
                            <input type="number" class="form-control sum" id="medicine" name="medicine">
                        </div>
                        <div class="form-group col">
                            <label>Medicine(Warehouse)</label>
                            <input type="number" class="form-control sum" id="medicine_warehouse"
                                name="medicine_warehouse">
                        </div>
                        <div class="form-group col">
                            <label>Accomodation/Guest room Expense</label>
                            <input type="number" class="form-control sum" id="accomodation" name="accomodation">
                        </div>
                        <div class="form-group col">
                            <label>Employee Welfare/Celebration</label>
                            <input type="number" class="form-control sum" id="welfare" name="welfare">
                        </div>
                    </div>
                    <div class="row">
                        <div class="form-group col">
                            <label>Delivery Expense</label>
                            <input type="number" class="form-control sum" id="delivery_expense" name="delivery_expense">
                        </div>
                        <div class="form-group col">
                            <label>Wages-Hire Labour</label>
                            <input type="number" class="form-control sum" id="labour_wage" name="labour_wage">
                        </div>
                        <div class="form-group col">
                            <label>Store Material</label>
                            <input type="number" class="form-control sum" id="store_material" name="store_material">
                        </div>
                        <div class="form-group col">
                            <label>Store Material(Warehouse)</label>
                            <input type="number" class="form-control sum" id="store_material_warehouse"
                                name="store_material_warehouse">
                        </div>
                    </div>
                    <div class="row">
                        <div class="form-group col">
                            <label>Truck Fare/Transport</label>
                            <input type="number" class="form-control sum" id="transport" name="transport">
                        </div>
                        <div class="form-group col">
                            <label>Fuel oil & Gas</label>
                            <input type="number" class="form-control sum" id="fuel_oil" name="fuel_oil">
                        </div>
                        <div class="form-group col">
                            <label>Vehicle Servicing</label>
                            <input type="number" class="form-control sum" id="vehicle_servicing"
                                name="vehicle_servicing">
                        </div>
                        <div class="form-group col">
                            <label>Toll/Ferry & Police Case</label>
                            <input type="number" class="form-control sum" id="toll_police_case" name="toll_police_case">
                        </div>
                    </div>
                    <div class="row">
                        <div class="form-group col">
                            <button type="submit" class="btn btn-primary">Save</button>
                        </div>
                        <div class="form-group col form-inline">
                            <label class="mr-2 font-weight-bold">Total</label>
                            <input class="total form-control font-weight-bold" disabled>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
@push('css')
<link rel="stylesheet" href="{{ url('/') }}/assets/css/datepicker.css" />
@endpush
@push('scripts')
<script>
    $('.sum').keyup(function () {
        var sum = 0;
        $('.sum').each(function () {
            sum += Number($(this).val());
        });
        $('.total').val(sum);
    });

    var date = new Date();
    var today = new Date(date.getFullYear(), date.getMonth(), date.getDate());
    var optSimple = {
        format: 'dd-mm-yyyy',
        todayHighlight: true,
        orientation: 'bottom right',
        autoclose: true,
        startDate: '-6d',
        endDate: '0d'
    };
    $('.datepicker').datepicker(optSimple);
    $('.datepicker').datepicker('setDate', today);


</script>
@endpush