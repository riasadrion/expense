@extends('layouts.admin')
@section('content')
<div class="container">
    <h2 class="main-title">Dashboard</h2>
    <div class="row">
        <div class="col">
            <div class="card my-card">
                <div class="card-header bg-primary text-white">
                    <strong>@lang('Users')</strong>
                </div>
                <div class="card-body">
                    <div class="row mb-2">
                        <div class="col">
                            <button class="btn btn-success" data-toggle="modal" data-target="#add">Add new</button>
                        </div>
                        <div class="col">
                            <form action="{{route('users.search')}}" method="post">
                                @csrf
                                <div class="input-group col-sm-12 mb-3 float-end">
                                    <input type="text" class="form-control" name="keyword"
                                        placeholder="@lang('Search')">
                                </div>
                            </form>
                        </div>
                    </div>
                    <table class="table">
                        <thead>
                            <tr>
                                <th>Name</th>
                                <th>Email</th>
                                <th>Group</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($items as $item)
                            <tr>
                                <td class="col-2">{{$item->name}}</td>
                                <td class="col-3">{{$item->email}}</td>
                                <td class="col-3">
                                    @if($item->user_group_id == 1)
                                    <span class="badge badge-pill btn-success text-white">Admin</span>
                                    @else
                                    <span class="badge badge-pill btn-secondary">User</span>
                                    @endif
                                </td>
                                <td class="col-3">
                                    <button class="edit btn-warning" data-object="{{$item}}" data-toggle="modal"
                                        data-target="#edit"><i class="fas fa-pen"></i></button>
                                    <button class="delete btn-danger" data-id="{{$item->id}}" data-toggle="modal"
                                        data-target="#delete"><i class="fas fa-trash"></i></button>
                                </td>
                            </tr>
                            @empty
                            <p>No Data</p>
                            @endforelse
                        </tbody>
                    </table>
                    {{ $items->links() }}
                </div>
            </div>
        </div>
    </div>
</div>
{{-- Add modal --}}
<div class="modal fade" id="add" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle"
    aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLongTitle">@lang('Add')</h5>
                <button type="button" class="btn-close" data-dismiss="modal" aria-label="Close"></button>
            </div>
            <form id="form1" class="form-ad" action="{{ route('users.store')}}" method="POST">
                <div class="modal-body">
                    @csrf
                    <div class="form-group">
                        <label>@lang('User Group')</label>
                        <select name="user_group_id" id="" class="form-control">
                            <option value="1">Admin</option>
                            <option value="2">User</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label>@lang('Name')</label>
                        <input type="text" name="name" id="name" class="form-control" placeholder="@lang('Name')"
                            required>
                    </div>
                    <div class="form-group">
                        <label>@lang('Email')</label>
                        <input type="email" class="form-control" name="email" id="email" placeholder="@lang('Email')"
                            required>
                    </div>
                    <div class="form-group">
                        <label>@lang('Password')</label>
                        <input type="password" name="password" class="form-control" placeholder="@lang('Password')">
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <input type="submit" name="" class="btn btn-success" value="Save Changes">
                </div>
            </form>
        </div>
    </div>
</div>

{{-- edit modal --}}
<div class="modal fade" id="edit" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle"
    aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLongTitle">@lang('Update')</h5>
                <button type="button" class="btn-close" data-dismiss="modal" aria-label="Close"></button>
            </div>
            <form id="form2" class="form-ad" action="" method="POST">
                <div class="modal-body">
                    @method('put')
                    @csrf
                    <div class="form-group">
                        <label>@lang('User Group')</label>
                        <select name="user_group_id" id="user_group_id" class="form-control">
                            <option value="1">Admin</option>
                            <option value="2">User</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label>@lang('Name')</label>
                        <input type="text" name="name" id="name" class="form-control" placeholder="@lang('Name')"
                            required>
                    </div>
                    <div class="form-group">
                        <label>@lang('Email')</label>
                        <input type="email" class="form-control" name="email" id="email" placeholder="@lang('Email')"
                            required>
                    </div>
                    <div class="form-group">
                        <label>@lang('Password')</label>
                        <input type="password" name="password" class="form-control" placeholder="@lang('Password')">
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <input type="submit" name="" class="btn btn-success" value="Save Changes">
                </div>
            </form>
        </div>
    </div>
</div>


{{-- Delete modal --}}
<div class="modal fade" id="delete" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle"
    aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="btn-close" data-dismiss="modal" aria-label="Close"></button>
            </div>
            <form id="form3" class="form-ad" action="" method="POST">
                @method('delete')
                @csrf
                <div class="modal-body">
                    <h5 class="modal-title" id="exampleModalLongTitle">Are You Sure?</h5>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">No</button>
                    <input type="submit" name="" class="btn btn-danger" value="Yes">
                </div>
            </form>
        </div>
    </div>
</div>
@push('scripts')
<script>
    $('#edit').on('show.bs.modal', function (event) {
        var button = $(event.relatedTarget)
        var data = button.data('object')
        var modal = $(this)
        modal.find('.modal-body #user_group_id').val(data.user_group_id)
        modal.find('.modal-body #name').val(data.name)
        modal.find('.modal-body #email').val(data.email)
        $("#form2").attr('action', '{{url("/")}}/users/' + data.id);
    });
    $('#delete').on('show.bs.modal', function (event) {
        var button = $(event.relatedTarget)
        var id = button.data('id')
        var modal = $(this)
        $("#form3").attr('action', '{{url("/")}}/users/' + id);
    });
</script>
@endpush
@endsection