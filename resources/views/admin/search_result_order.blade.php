@extends('layouts.adminMainLayout')

@section('content')
    <div class="main-panel">
        <div class="content-wrapper">
            <div class="row">
                <div class="col-lg-12 grid-margin stretch-card">
                    <div class="card">
                        <div class="card-body">
                            <h4 class="card-title">Search Results</h4>
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
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @if($orders->isEmpty())
                                        <tr>
                                            <td colspan="7">No results found.</td>
                                        </tr>
                                    @else
                                        @foreach($orders as $order)
                                            <tr>
                                                <td>{{$order->id}}</td>
                                                <td>{{$order->user->first_name}}</td>
                                                <td>{{$order->user->last_name}}</td>
                                                <td>{{$order->order_date}}</td>
                                                <td>
                                                    <h10 style="text-decoration: underline">Delivery Area:</h10> {{$order->delivery_area}} <br><br>
                                                    <h10 style="text-decoration: underline">Complete Address:</h10> {{$order->complete_address}} <br><br>
                                                    <h10 style="text-decoration: underline">Delivery Instructions:</h10> {{$order->delivery_instructions}} <br><br>
                                                </td>
                                                <td>${{$order->total_price}}</td>
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
