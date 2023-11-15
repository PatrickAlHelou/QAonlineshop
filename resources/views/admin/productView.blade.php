@extends('layouts.adminMainLayout')

@section('content')
    <div class="main-panel">
        <div class="content-wrapper">
            <div class="row">
                <div class="col-lg-12 grid-margin stretch-card">
                    <div class="card">
                        <div class="card-body">
                            <div style="margin: 0 auto; text-align: center;">
                                <img src="{{asset($product->image)}}">
                            </div>
                            <div style="margin-top: 10px">
                                <h3 style="font-weight: bold;font-size: 30px">{{$product->name}}<label style="font-weight: normal;font-size: 20px;margin-left: 10px;color: blue"><a href="{{route('admin.product.edit',['id'=>$product->id])}}"><i class="mdi mdi-pencil"></i></a></label></h3>
                                <div class="col-sm-6 col-md-4 col-lg-3">
                                </div>

                            </div>
                            <br>
                            <div class="table-responsive">
                                <div>
                                    <div class="detail">
                                        <label style="font-weight: bold">Description:</label> {{$product->description}}
                                    </div>
                                    <div class="detail">
                                        <label style="font-weight: bold">Price:</label> ${{$product->price}}
                                    </div>
                                    <div class="detail">
                                        <label style="font-weight: bold">Category:</label> {{$category->name}}
                                    </div>
                                    <div class="detail">
                                        <label style="font-weight: bold">Sub Category:</label> {{$subCategory->name}}
                                    </div>
                                    {{--                                        <br>--}}
                                    {{--                                        <div class="detail">--}}
                                    {{--                                            <label style="font-weight: bold">Client Name:</label> {{$user->first_name}} {{$user->last_name}}--}}
                                    {{--                                        </div>--}}
                                    {{--                                        <br>--}}
                                    {{--                                        <div class="detail">--}}
                                    {{--                                            <label style="font-weight: bold;text-decoration: underline">Location:</label><br>--}}
                                    {{--                                            <label style="font-weight: bold;margin-left: 70px">Delivery Area:</label> {{$order->delivery_area}}<br>--}}
                                    {{--                                            <label style="font-weight: bold;margin-left: 70px">Complete Address:</label> {{$order->complete_address}}<br>--}}
                                    {{--                                            <label style="font-weight: bold;margin-left: 70px">Delivery Instructions:</label> {{$order->delivery_instructions}}<br>--}}
                                    {{--                                        </div>--}}
                                    {{--                                        <br>--}}
                                </div>
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
