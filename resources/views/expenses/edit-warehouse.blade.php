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
                            <label>Entertainment</label>
                            <input type="number" class="form-control sum" id="entertainment_warehouse"
                                name="entertainment_warehouse" value="{{ $expense->entertainment_warehouse }}">
                        </div>
                        <div class="form-group col">
                            <label>Conveyance</label>
                            <input type="number" class="form-control sum" id="conveyance_warehouse"
                                name="conveyance_warehouse" value="{{ $expense->conveyance_warehouse }}">
                        </div>
                    </div>
                    <div class="row">
                        <div class="form-group col">
                            <label>Delivery Expense</label>
                            <input type="number" class="form-control sum" id="delivery_expense" name="delivery_expense"
                                value="{{ $expense->delivery_expense }}">
                        </div>
                        <div class="form-group col">
                            <label>Wages-Hire Labour</label>
                            <input type="number" class="form-control sum" id="labour_wage" name="labour_wage"
                                value="{{ $expense->labour_wage }}">
                        </div>
                        <div class="form-group col">
                            <label>Stationery</label>
                            <input type="number" class="form-control sum" id="stationery_warehouse"
                                name="stationery_warehouse" value="{{ $expense->stationery_warehouse }}">
                        </div>

                    </div>
                    <div class="row">
                        <div class="form-group col">
                            <label>Store Material</label>
                            <input type="number" class="form-control sum" id="store_material_warehouse"
                                name="store_material_warehouse" value="{{ $expense->store_material_warehouse }}">
                        </div>
                        <div class="form-group col">
                            <label>Medicine</label>
                            <input type="number" class="form-control sum" id="medicine_warehouse"
                                name="medicine_warehouse" value="{{ $expense->medicine_warehouse }}">
                        </div>
                        <div class="form-group col">
                            <label>Maintenance</label>
                            <input type="number" class="form-control sum" id="maintenance_warehouse"
                                name="maintenance_warehouse" value="{{ $expense->maintenance_warehouse }}">
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
        startDate: '-14d',
        endDate: '0d'
    };
    $('.datepicker').datepicker(optSimple);
</script>
@endpush