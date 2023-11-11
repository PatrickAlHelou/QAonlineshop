@extends('layouts.adminMainLayout')

@section('content')

    <div class="main-panel">
        <div class="content-wrapper">
            <div class="row">
                <div class="col-lg-12 grid-margin stretch-card">
                    <div class="card">
                        <div class="card-body">

                            <div class="mb-3">

                            </div>

                            <h4 class="card-title">User Created</h4>
                            <div class="table-responsive">
                                <table class="table">
                                    <thead>
                                    <tr>
                                        <th>Username</th>
                                        <th>Firstname</th>
                                        <th>Lastname</th>
                                        <th>Email</th>
                                        <th>Created At</th>
                                        <th>Action</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @if(count($notifications) > 0)
                                        @foreach ($notifications as $notification)
                                            <tr>
                                                <td>{{ $notification->username }}</td>
                                                <td>{{ $notification->first_name }}</td>
                                                <td>{{ $notification->last_name }}</td>
                                                <td>{{ $notification->email }}</td>
                                                <td>{{ $notification->created_at }}</td>
                                                <td>
                                                    <form id="delete-form-{{ $notification->id }}" action="{{ route('admin.notification.delete', ['id' => $notification->id]) }}" method="POST">
                                                        @csrf
                                                        @method('DELETE')
                                                        <button type="submit" class="btn btn-danger">Delete</button>
                                                    </form>
                                                </td>
                                            </tr>
                                        @endforeach
                                    @else
                                        <tr>
                                            <td colspan="6">No notifications found.</td>
                                        </tr>
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
