@extends('layouts.adminMainLayout')

@section('content')
    <div class="main-panel">
        <div class="content-wrapper">
            <div class="row">
                <div class="col-lg-12 grid-margin stretch-card">
                    <div class="card">
                        <div class="card-body">
                            <h4 class="card-title">Categories</h4>
                            <form method="GET" action="{{route('admin.product.create')}}">
                                <button style="float: right" type="submit" class="btn btn-success">+ Add Product</button>
                            </form>
                            <div class="table-responsive">
                                <table class="table">
                                    <thead>
                                    <tr>
                                        <th>Product Name</th>
                                        <th>Category</th>
                                        <th>Sub Category</th>
                                        <th>Price</th>
                                        <th>Quantity</th>
                                        <th>Action</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @if($inventory == '[]')
                                        <tr>
                                            <td></td>
                                            <td></td>
                                            <td>No data</td>
                                            <td></td>
                                            <td></td>
                                        </tr>
                                    @else
                                        @foreach($inventory as $item)
                                            <tr>
                                                @foreach($products as $product)
                                                    @if($product->id == $item->product_id)
                                                        <td>{{$product->name}}</td>
                                                        @foreach($categories as $category)
                                                            @if($category->id == $product->category_id)
                                                                <td>{{$category->name}}</td>
                                                            @endif
                                                        @endforeach
                                                        @foreach($subCategories as $subCategory)
                                                            @if($subCategory->id == $product->sub_category_id)
                                                                <td>{{$subCategory->name}}</td>
                                                            @endif
                                                        @endforeach
                                                        <td>{{$product->price}}</td>
                                                    @endif
                                                @endforeach
                                                <td>{{$item->quantity}}</td>
                                                <td>
                                                    <button type="button" class="btn btn-secondary"><a href="{{route('admin.product.edit',['id'=>$item->id])}}" style="color: white;text-decoration: none">View</a></button>
                                                    <button type="button" class="btn btn-info"><a href="{{route('admin.product.edit',['id'=>$item->id])}}" style="color: white;text-decoration: none">Edit</a></button>
                                                    <button type="button" class="btn btn-danger"><a href="{{route('admin.product.delete',['id'=>$item->id])}}" style="color: white;text-decoration: none">Delete</a></button>
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
