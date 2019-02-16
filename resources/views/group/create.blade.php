@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">Create New Group</div>

                    <div class="card-body">
                        <form action="{{route('store_group')}}" method="post">
                            {{csrf_field()}}
                            <div class="row">
                                <div class="col-lg-12">
                                    <h5>Group name: </h5>
                                    <input id="group_name"
                                           class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}"
                                           type="text" name="group_name" required>

                                    @if ($errors->has('group_name'))
                                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('group_name') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>

                            <br>

                            <div class="row">
                                <div class="col-lg-12">
                                    <h5 style="margin-bottom: 15px;">Group permissions:</h5>

                                    <label for="create">Creat</label>
                                    <input style="margin-right: 10px;" type="checkbox" name="group_create">

                                    <label for="edit">Edit</label>
                                    <input style="margin-right: 10px;" type="checkbox" name="group_edit">

                                    <label for="block">Block</label>
                                    <input style="margin-right: 10px;" type="checkbox" name="group_block">

                                    <label for="delete">Delete</label>
                                    <input style="margin-right: 10px;" type="checkbox" name="group_delete">

                                    <label for="delete">Group Assign</label>
                                    <input style="margin-right: 10px;" type="checkbox" name="group_assign">

                                    <label for="delete">Assign Permission</label>
                                    <input style="margin-right: 10px;" type="checkbox" name="assign_permission">
                                </div>
                            </div>

                            <div class="form-group row mb-0">
                                <div class="col-md-6">
                                    <button type="submit" class="btn btn-success">
                                        {{__('Add New Group')}}
                                    </button>

                                    <a href="{{URL::previous()}}" class="btn btn-primary">{{ __('Back') }}</a>
                                </div>
                            </div>

                        </form>
                    </div>
                </div>
            </div>
        </div>

    </div>
@endsection
