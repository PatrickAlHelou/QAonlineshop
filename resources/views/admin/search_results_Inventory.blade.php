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
                                        <th>Product Name</th>
                                        <th>Quantity</th>
                                        <th>Action</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @if($inventory->isEmpty())
                                        <tr>
                                            <td colspan="6">No results found.</td>
                                        </tr>
                                    @else
                                        @foreach($inventory as $item)
                                            <tr>
                                                <td>{{ optional($item->product)->name }}</td>
                                                <td>{{ $item->quantity }}</td>
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
    </div>
@endsection
