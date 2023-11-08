@extends('layouts.adminMainLayout')

@section('content')
    <div class="main-panel">
        <div class="content-wrapper">
            <div class="row">
                <div class="col-lg-12 grid-margin stretch-card">
                    <div class="card">
                        <div class="card-body">

                            <div class="mb-3">
                                <form action="{{ route('admin.user.search') }}" method="GET" class="input-group">
                                    <input type="text" class="form-control form-control-sm" placeholder="Search users" name="query" style="background-color: #f2f2f2; color: #333;">
                                    <div class="input-group-append">
                                        <button class="btn btn-primary btn-sm" type="submit">Search</button>
                                    </div>
                                </form>
                            </div>


                            <h4 class="card-title">Users</h4>
                            <form method="GET" action="{{route('admin.user.create')}}">
                                <button style="float: right" type="submit" class="btn btn-success">+ Add User</button>
                            </form>
                            <div class="table-responsive">
                                <table class="table">
                                    <thead>
                                    <tr>
                                        <th>Username</th>
                                        <th>Firstname</th>
                                        <th>Lastname</th>
                                        <th>Email</th>
                                        <th>PhoneNumber</th>
                                        <th>Action</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @if($users == '[]')
                                        <tr>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                            <td>No data</td>
                                            <td></td>
                                            <td></td>
                                        </tr>
                                    @else
                                        @foreach($users as $user)
                                            <tr>
                                                <td>{{$user->username}}</td>
                                                <td>{{$user->first_name}}</td>
                                                <td>{{$user->last_name}}</td>
                                                <td>{{$user->email}}</td>
                                                <td>{{$user->phone_number}}</td>
                                                <td>
                                                    <button type="button" class="btn btn-secondary"><a href="{{route('admin.user.edit',['id'=>$user->id])}}" style="color: white;text-decoration: none">View</a></button>
                                                    <button type="button" class="btn btn-info"><a href="{{route('admin.user.edit',['id'=>$user->id])}}" style="color: white;text-decoration: none">Edit</a></button>
                                                    <button type="button" class="btn btn-danger"><a href="{{route('admin.user.delete',['id'=>$user->id])}}" style="color: white;text-decoration: none">Delete</a></button>
                                                </td>
                                            </tr>
                                        @endforeach
                                    @endif
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- content-wrapper ends -->
        <!-- partial:../../partials/_footer.html -->
        <footer class="footer">
            <div class="d-sm-flex justify-content-center justify-content-sm-between">
                <span class="text-muted text-center text-sm-left d-block d-sm-inline-block">All rights reserved.</span>
            </div>
        </footer>
        <!-- partial -->
    </div>
@endsection
