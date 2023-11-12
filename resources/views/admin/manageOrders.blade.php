@extends('layouts.adminMainLayout')

@section('content')
    <div class="main-panel">
        <div class="content-wrapper">
            <div class="row">
                <div class="col-lg-12 grid-margin stretch-card">
                    <div class="card">
                        <div class="card-body">
                            <h4 class="card-title">Orders</h4>
                            <div class="table-responsive">
                                <div class="row mb-3">
                                    <div class="col-md-6">
                                        <form action="{{ route('admin.orders.search') }}" method="GET" class="input-group">
                                            <input type="text" class="form-control form-control-sm" placeholder="Search users" name="query" style="background-color: #f2f2f2; color: #333;">
                                            <div class="input-group-append">
                                                <button class="btn btn-primary btn-sm" type="submit">Search</button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                                <table class="table">
                                    <thead>
                                    <tr>
                                        <th>Order ID</th>
                                        <th>Client Firstname</th>
                                        <th>Client Lastname</th>
                                        <th>Order Date</th>
                                        <th>Location Details</th>
                                        <th>Total Price</th>
                                        <th>Action</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @if($orders == '[]')
                                        <tr>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                            <td>No data</td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                        </tr>
                                    @else
                                        @foreach($orders as $order)
                                            <tr>
                                                <td>{{$order->id}}</td>
                                                @foreach($users as $user)
                                                    @if($user->id == $order->user_id)
                                                        <td>{{$user->first_name}}</td>
                                                        <td>{{$user->last_name}}</td>
                                                    @endif
                                                @endforeach
                                                <td>{{$order->order_date}}</td>
                                                <td>
                                                    <h10 style="text-decoration: underline">Delivery Area:</h10> {{$order->delivery_area}} <br><br>
                                                    <h10 style="text-decoration: underline">Complete Address:</h10> {{$order->complete_address}} <br><br>
                                                    <h10 style="text-decoration: underline">Delivery Instructions:</h10> {{$order->delivery_instructions}} <br><br>
                                                </td>
                                                <td>${{$order->total_price}}</td>
                                                <td class="d-flex align-items-center justify-content-center">
                                                    <button type="button" class="btn btn-primary" style="margin-right: 10px"><a href="{{route('admin.orders.detail',['id'=>$order->id])}}" style="color: white;text-decoration: none">View</a></button>
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
