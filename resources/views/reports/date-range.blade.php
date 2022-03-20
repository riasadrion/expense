@extends('layouts.admin')
@section('content')
<div class="container">
    <h2 class="main-title">Date range report</h2>
    <div class="row stat-cards">
        <div class="card col-12">
            <div class="card-body">
                <form method="POST" action="{{route('get.report')}}">
                    @csrf
                    <div class="row">
                        <div class="form-group col-4">
                            <label>From</label>
                            <input name="from" class="datepicker form-control">
                        </div>
                        <div class="form-group col-4">
                            <label>To</label>
                            <input name="to" class="datepicker form-control">
                        </div>
                    </div>
                    <div class="row">
                        <div class="form-group col">
                            <button class="btn btn-primary" type="submit">Show</button>
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
    var date = new Date();
    var today = new Date(date.getFullYear(), date.getMonth(), date.getDate());
    var optSimple = {
        format: 'dd-mm-yyyy',
        todayHighlight: true,
        orientation: 'bottom right',
        autoclose: true,
    };
    $('.datepicker').datepicker(optSimple);
    $('.datepicker').datepicker('setDate', today);
</script>
@endpush