@extends('layouts.admin')
@section('content')
<div class="container">
    <h2 class="main-title">Update expense</h2>
    @if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
    @endif
    <div class="row stat-cards">
        <div class="card col-12">
            <div class="card-body">
                <form method="POST" action="{{route('expenses.update', ['expense' => $expense->id])}}">
                    @csrf
                    @method('put')
                    <div class="row">

                        <div class="form-group col-4">
                            <label class="mr-2 font-weight-bold">Total</label>
                            <input class="total form-control font-weight-bold" disabled value="{{ $expense->total }}">
                        </div>
                    </div>
                    <div class="row">
                        <div class="form-group col-4">
                            <label>Date</label>
                            <input name="date" class="datepicker form-control" value="{{ $expense->date }}">
                        </div>
                        <div class="form-group col">
                            <label>Office Meal</label>
                            <input type="number" class="form-control sum" id="office_meal" name="office_meal"
                                value="{{ $expense->office_meal }}">
                        </div>
                        <div class="form-group col">
                            <label>Entertainment</label>
                            <input type="number" class="form-control sum" id="entertainment" name="entertainment"
                                value="{{ $expense->entertainment }}">
                        </div>
                    </div>
                    <div class="row">
                        <div class="form-group col">
                            <label>Stationery</label>
                            <input type="number" class="form-control sum" id="stationery" name="stationery"
                                value="{{ $expense->stationery }}">
                        </div>
                        <div class="form-group col">
                            <label>Office Maintenance</label>
                            <input type="number" class="form-control sum" id="maintenance" name="maintenance"
                                value="{{ $expense->maintenance }}">
                        </div>
                        <div class="form-group col">
                            <label>Import Permit Expenses</label>
                            <input type="number" class="form-control sum" id="import_permit" name="import_permit">
                        </div>
                    </div>
                    <div class="row">
                        <div class="form-group col">
                            <label>Tips</label>
                            <input type="number" class="form-control sum" id="tips" name="tips">
                        </div>
                        <div class="form-group col">
                            <label>Conveyance</label>
                            <input type="number" class="form-control sum" id="conveyance" name="conveyance"
                                value="{{ $expense->conveyance }}">
                        </div>
                        <div class="form-group col">
                            <label>Gas Cylinder(Cook)</label>
                            <input type="number" class="form-control sum" id="gas_cylinder" name="gas_cylinder"
                                value="{{ $expense->gas_cylinder }}">
                        </div>
                    </div>
                    <div class="row">
                        <div class="form-group col">
                            <label>Dish Bill</label>
                            <input type="number" class="form-control sum" id="dish_bill" name="dish_bill"
                                value="{{ $expense->dish_bill }}">
                        </div>
                        <div class="form-group col">
                            <label>Medicine</label>
                            <input type="number" class="form-control sum" id="medicine" name="medicine"
                                value="{{ $expense->medicine }}">
                        </div>
                        <div class="form-group col">
                            <label>Accomodation/Guest room Expense</label>
                            <input type="number" class="form-control sum" id="accomodation" name="accomodation"
                                value="{{ $expense->accomodation }}">
                        </div>
                    </div>
                    <div class="row">
                        <div class="form-group col">
                            <label>Employee Welfare/Celebration</label>
                            <input type="number" class="form-control sum" id="welfare" name="welfare"
                                value="{{ $expense->welfare }}">
                        </div>
                        <div class="form-group col">
                            <label>Store Material</label>
                            <input type="number" class="form-control sum" id="store_material" name="store_material"
                                value="{{ $expense->store_material }}">
                        </div>
                        <div class="form-group col">
                            <label>Truck Fare/Transport</label>
                            <input type="number" class="form-control sum" id="transport" name="transport"
                                value="{{ $expense->transport }}">
                        </div>
                    </div>
                    <div class="row">
                        <div class="form-group col">
                            <label>Fuel oil & Gas</label>
                            <input type="number" class="form-control sum" id="fuel_oil" name="fuel_oil"
                                value="{{ $expense->fuel_oil }}">
                        </div>
                        <div class="form-group col">
                            <label>Vehicle Servicing</label>
                            <input type="number" class="form-control sum" id="vehicle_servicing"
                                name="vehicle_servicing" value="{{ $expense->vehicle_servicing }}">
                        </div>
                        <div class="form-group col">
                            <label>Toll/Ferry & Police Case</label>
                            <input type="number" class="form-control sum" id="toll_police_case" name="toll_police_case"
                                value="{{ $expense->toll_police_case }}">
                        </div>
                        <div class="form-group col">
                            <label>Mobile Bill</label>
                            <input type="number" class="form-control sum" id="mobile_bill" name="mobile_bill"
                                value="{{ $expense->mobile_bill }}">
                        </div>
                    </div>
                    <div class="row">
                        <div class="form-group col">
                            <button type="submit" class="btn btn-primary">Save</button>
                        </div>
                        <div class="form-group col form-inline">
                            <label class="mr-2 font-weight-bold">Total</label>
                            <input class="total form-control font-weight-bold" value="{{ $expense->total }}" disabled>
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

    var optSimple = {
        format: 'dd-mm-yyyy',
        todayHighlight: true,
        orientation: 'bottom right',
        autoclose: true,
        startDate: '-6d',
        endDate: '0d'
    };
    $('.datepicker').datepicker(optSimple);
</script>
@endpush