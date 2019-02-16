@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">Users</div>

                    <div class="card-body">
                        <form action="{{$resource}}/create" method="post">
                            {{csrf_field()}}
                            <input name="_method" type="hidden" value="get"/>
                            <button type="submit" class="btn btn-success" id="add_user_button">Add
                                user
                            </button>
                        </form>

                        <table id="example" class="table table-bordered table-bordered display" style="width:100%">
                            <thead>
                            <tr>
                                <th>Name</th>
                                <th>Email</th>
                                <th>Created At</th>
                                <th>Updated At</th>
                                <th>Action</th>
                            </tr>
                            </thead>
                        </table>
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
