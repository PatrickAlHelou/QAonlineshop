@extends('layouts.adminMainLayout')

@section('content')
    <div class="main-panel">
        <div class="content-wrapper">
            <div class="row">
                <div class="col-lg-12 grid-margin stretch-card">
                    <div class="card">
                        <div class="card-body">
                            <h4 class="card-title">Categories</h4>
                            <form method="GET" action="{{route('admin.categories.create')}}">
                                <button style="float: right" type="submit" class="btn btn-success">+ Add Category</button>
                            </form>
                            <div class="table-responsive">
                                <table class="table">
                                    <thead>
                                    <tr>
                                        <th>Image</th>
                                        <th>Name</th>
                                        <th>No. of Sub Categories</th>
                                        <th>Action</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @if($categories == '[]')
                                        <tr>
                                            <td></td>
                                            <td>No data</td>
                                            <td></td>
                                            <td></td>
                                        </tr>
                                    @else
                                        @foreach($categories as $category)
                                            <tr>
                                                <td><img src="{{asset($category->image)}}"></td>
                                                <td>{{$category->name}}</td>
                                                @php
                                                    $counter = 0;
                                                @endphp
                                                @foreach($subCategories as $subCategory)
                                                    @if($subCategory->category_id == $category->id)
                                                        @php
                                                            $counter++;
                                                        @endphp
                                                    @endif
                                                @endforeach
                                                <td>{{$counter}}</td>
                                                <td>
                                                    <button type="button" class="btn btn-info"><a href="{{route('admin.categories.edit',['id'=>$category->id])}}" style="color: white;text-decoration: none">Edit</a></button>
                                                    <button type="button" class="btn btn-danger"><a href="{{route('admin.categories.delete',['id'=>$category->id])}}" style="color: white;text-decoration: none">Delete</a></button>
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
