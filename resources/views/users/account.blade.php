@extends('layouts.admin')
@section('content')
<div class="container">
    <h2 class="main-title" Account Settings</h2>
        <div class="row stat-cards">
            <div class="card col-12">
                <div class="card-body">
                    <form method="POST" action="{{route('users.update', ['user' => Auth::user()->id])}}">
                        @csrf
                        @method('put')
                        <div class="row">
                            <div class="form-group col">
                                <label>@lang('Name')</label>
                                <input type="text" name="name" id="name" class="form-control"
                                    placeholder="@lang('Name')" value="{{ Auth::user()->name }}" required>
                            </div>
                            <div class="form-group col">
                                <label>@lang('Email')</label>
                                <input type="email" class="form-control" name="email" id="email"
                                    value="{{ Auth::user()->email }}" placeholder="@lang('Email')" required>
                            </div>
                            <div class="form-group col">
                                <label>@lang('Password')</label>
                                <input type="password" name="password" class="form-control"
                                    placeholder="@lang('Password')">
                            </div>
                            <input type="hidden" name="user_group_id" value="{{Auth::user()->user_group_id}}">
                        </div>
                        <div class="row">
                            <div class="form-group col">
                                <button type="submit" class="btn btn-success">Update</button>
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