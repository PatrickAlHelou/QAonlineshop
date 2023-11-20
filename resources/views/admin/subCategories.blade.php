@extends('layouts.adminMainLayout')

@section('content')
    <div class="main-panel">
        <div class="content-wrapper">
            <div class="row">
                <div class="col-lg-12 grid-margin stretch-card">
                    <div class="card">
                        <div class="card-body">
                            <h4 class="card-title">Sub Categories</h4>

                            <form method="GET" action="{{ route('admin.subcategory.search') }}">
                                <div class="input-group mb-3">
                                    <input type="text" class="form-control" placeholder="Search by name" name="query">
                                    <div class="input-group-append">
                                        <button class="btn btn-primary" type="submit">Search</button>
                                    </div>
                                </div>
                            </form>

                            <form method="GET" action="{{route('admin.subCategories.create')}}">
                                <button style="float: right" type="submit" class="btn btn-success">+ Add Sub Category</button>
                            </form>
                            <div class="table-responsive">
                                <table class="table">
                                    <thead>
                                    <tr>
                                        <th>Image</th>
                                        <th>Name</th>
                                        <th>Parent</th>
                                        <th>No. of Products</th>
                                        <th>Action</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @if($subCategories == '[]')
                                        <tr>
                                            <td></td>
                                            <td></td>
                                            <td>No data</td>
                                            <td></td>
                                            <td></td>
                                        </tr>
                                    @else
                                        @foreach($subCategories as $subCategory)
                                            <tr>
                                                <td><img src="{{asset($subCategory->image)}}"></td>
                                                <td>{{$subCategory->name}}</td>
                                                @foreach($categories as $category)
                                                    @if($category->id == $subCategory->category_id)
                                                        <td>{{$category->name}}</td>
                                                    @endif
                                                @endforeach
                                                @php
                                                    $count = 0
                                                @endphp
                                                @foreach($products as $product)
                                                    @if($subCategory->id == $product->sub_category_id)
                                                        @php
                                                            $count++
                                                        @endphp
                                                    @endif
                                                @endforeach
                                                <td>{{$count}}</td>
                                                <td>
                                                    <button type="button" class="btn btn-info"><a href="{{route('admin.subCategories.edit',['id'=>$subCategory->id])}}" style="color: white;text-decoration: none">Edit</a></button>
                                                    <button type="button" class="btn btn-danger"><a href="{{route('admin.subCategories.delete',['id'=>$subCategory->id])}}" style="color: white;text-decoration: none">Delete</a></button>
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
