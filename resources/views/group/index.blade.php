@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">Groups</div>

                    <form action="{{route('create_group')}}" method="post"
                          style="margin-top: 10px; margin-right: 10px;">
                        {{csrf_field()}}
                        <button type="submit" class="btn btn-success" id="add_user_button">
                            {{__('Add new group')}}
                        </button>
                    </form>

                    <div class="card-body">


                        <form action="{{route('update_group')}}" method="post">
                            {{csrf_field()}}
                            @foreach($groups as $group)
                                <div class="row">
                                    <div class="col-lg-8">
                                        <input type="text" name="{{$group->id}}_group_id" value="{{$group->id}}" hidden>
                                        <h5>Group name: </h5>
                                        <input class="form-control" type="text" name="{{$group->id}}_name"
                                               value="{{$group->name}}">
                                        <label for="">Delete group</label>
                                        <input type="checkbox" name="{{$group->id}}_delete_group">
                                    </div>

                                    <div class="col-lg-4">
                                        <h5 style="margin-bottom: 15px;">Group permissions:</h5>

                                        <label for="create">Creat</label>
                                        <input style="margin-right: 10px;" type="checkbox" name="{{$group->id}}_create"
                                                {{($group->create == 1) ? "checked" :  ""}}>

                                        <label for="edit">Edit</label>
                                        <input style="margin-right: 10px;" type="checkbox" name="{{$group->id}}_edit"
                                                {{($group->edit == 1) ? "checked" :  ""}}>

                                        <label for="block">Block</label>
                                        <input style="margin-right: 10px;" type="checkbox" name="{{$group->id}}_block"
                                                {{($group->block == 1) ? "checked" :  ""}}>

                                        <label for="delete">Delete</label>
                                        <input style="margin-right: 10px;" type="checkbox" name="{{$group->id}}_delete"
                                                {{($group->delete == 1) ? "checked" :  ""}}>

                                        <label for="delete">Group Assign</label>
                                        <input style="margin-right: 10px;" type="checkbox"
                                               name="{{$group->id}}_group_assign" {{($group->allow_assign == 1) ? "checked" :  ""}}>

                                        <label for="delete">Assign Permission</label>
                                        <input style="margin-right: 10px;" type="checkbox"
                                               name="{{$group->id}}_assign_permission" {{($group->allow_permission == 1) ? "checked" :  ""}}>
                                    </div>
                                </div>
                            @endforeach

                            <div class="form-group row mb-0">
                                <div class="col-md-6">
                                    <button type="submit" class="btn btn-success">
                                        {{__('Update Groups')}}
                                    </button>

                                    <a href="{{URL::previous()}}" class="btn btn-primary">{{ __('Back') }}</a>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>

                @if (session('status'))
                    <div class="alert alert-info" style="margin-top: 5px;">
                        {{ session('status') }}
                    </div>
                @endif
            </div>
        </div>
    </div>
@endsection
