@extends('layouts.adminMainLayout')

@section('content')
    <div class="main-panel">
        <div class="content-wrapper">
            <div class="row">
                <div class="col-lg-12 grid-margin stretch-card">
                    <div class="card">
                        <div class="card-body">
                            {{--                            <div class="mb-3">--}}
                            {{--                                <form action="{{ route('admin.user.search') }}" method="GET" class="input-group">--}}
                            {{--                                    <input type="text" class="form-control form-control-sm" placeholder="Search users" name="query" style="background-color: #f2f2f2; color: #333;">--}}
                            {{--                                    <div class="input-group-append">--}}
                            {{--                                        <button class="btn btn-primary btn-sm" type="submit">Search</button>--}}
                            {{--                                    </div>--}}
                            {{--                                </form>--}}
                            {{--                            </div>--}}
                            <h4 class="card-title">Orders</h4>
                            {{--                            <form method="GET" action="{{route('admin.user.create')}}">--}}
                            {{--                                <button style="float: right" type="submit" class="btn btn-success">+ Add User</button>--}}
                            {{--                            </form>--}}
                            <div class="table-responsive">
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
                                                    {{--                                                    <select onchange="change_status({{$order->id}})" class="form-control" style="width: 100px;height: 30px" id="status_change" name="status_change">--}}
                                                    {{--                                                        <option value="Canceled" @if($order->status == "Canceled") selected @endif>Cancel</option>--}}
                                                    {{--                                                        <option value="Pending" @if($order->status == "Pending") selected @endif>Pending</option>--}}
                                                    {{--                                                        <option value="Accepted" @if($order->status == "Accepted") selected @endif>Accept</option>--}}
                                                    {{--                                                        <option value="In Transit" @if($order->status == "In Transit") selected @endif>In Transit</option>--}}
                                                    {{--                                                        <option value="Delivered" @if($order->status == "Delivered") selected @endif>Delivered</option>--}}
                                                    {{--                                                    </select>--}}
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
