@extends('layouts.adminMainLayout')

@section('content')
    <div class="main-panel">
        <div class="content-wrapper">
            <div class="row">
                <div class="col-lg-12 grid-margin stretch-card">
                    <div class="card">
                        <div class="card-body">
                            <h3 style="font-weight: bold;text-decoration: underline">Order Info</h3>
                            <br>
                            <div class="table-responsive">
                                <div class="detailSectionUp">
                                    <div class="left">
                                        <div class="detail">
                                            <label style="font-weight: bold">Order ID:</label> #{{$order->id}}
                                        </div>
                                        <br>
                                        <div class="detail">
                                            <label style="font-weight: bold">Client Name:</label> {{$user->first_name}} {{$user->last_name}}
                                        </div>
                                        <br>
                                        <div class="detail">
                                            <label style="font-weight: bold;text-decoration: underline">Location:</label><br>
                                            <label style="font-weight: bold;margin-left: 70px">Delivery Area:</label> {{$order->delivery_area}}<br>
                                            <label style="font-weight: bold;margin-left: 70px">Complete Address:</label> {{$order->complete_address}}<br>
                                            <label style="font-weight: bold;margin-left: 70px">Delivery Instructions:</label> {{$order->delivery_instructions}}<br>
                                        </div>
                                        <br>
                                    </div>
                                    <div class="right">

                                    </div>
                                </div>
                                <h3 style="font-weight: bold;text-decoration: underline">Items</h3>
                                <table class="table">
                                    <thead>
                                    <tr>
                                        <th>Image</th>
                                        <th>Product</th>
                                        <th>Price</th>
                                        <th>Quantity</th>
                                        <th>Total Price</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @if($order_detail == '[]')
                                        <tr>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                            <td>No data</td>
                                            <td></td>
                                            <td></td>
                                        </tr>
                                    @else
                                        @php
                                            $total = 0;
                                        @endphp
                                        @foreach($order_detail as $detail)
                                            <tr>
                                                @foreach($products as $product)
                                                    @if($product->id == $detail->product_id)
                                                        <td><img style="width: 100px;height: 100px" src="{{asset($product->image)}}"
                                                                 alt="Generic placeholder image"></td>
                                                        <td>{{$product->name}}</td>
                                                    @endif
                                                @endforeach
                                                <td>${{$detail->price}}</td>
                                                <td>{{$detail->quantity}}</td>
                                                <td>${{$detail->price}}</td>
                                                @php
                                                    $total += $detail->price;
                                                @endphp
                                            </tr>
                                        @endforeach
                                    @endif
                                    </tbody>
                                </table>
                                <label style="font-weight: bold;float: right;margin-right: 195px;">Total: ${{$total}}</label>
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
