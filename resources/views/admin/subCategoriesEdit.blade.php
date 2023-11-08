@extends('layouts.adminMainLayout')

@section('content')
    <div class="main-panel">
        <div class="content-wrapper">
            <div class="row">
                <div class="col-12 grid-margin stretch-card">
                    <div class="card">
                        <div class="card-body">
                            <h4 class="card-title">Adding New Category</h4>
                            <form method="POST" action="{{route('admin.subCategories.update',['id'=>$subCategory->id])}}" enctype="multipart/form-data">
                                @csrf
                                <div class="form-group">
                                    <label for="name">Name</label>
                                    <input type="text" class="form-control" id="name" name="name" placeholder="Name" value="{{$subCategory->name}}">
                                    @error('name')
                                    <span class="text-danger" style="color: red">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="category_id">Parent Category</label>
                                    <select class="form-control" id="category_id" name="category_id">
                                        <option value="">Choose Parent Category</option>
                                        @foreach($categories as $category)
                                            <option value="{{$category->id}}" @if($subCategory->category_id == $category->id) selected @endif>{{$subCategory->name}}</option>
                                        @endforeach
                                    </select>
                                    @error('category_id')
                                    <span class="text-danger" style="color: red">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <div class="form-group">
                                        <label>Image</label>
                                        <div class="input-group col-xs-12">
                                            <input type="file" class="form-control file-upload-info"
                                                   placeholder="Upload Image" name="image">
                                        </div>
                                        @error('image')
                                        <span class="text-danger" style="color: red">{{ $message }}</span>
                                        @enderror
                                    </div>
                                    <div class="form-group">
                                        <label for="description">Description</label>
                                        <textarea class="form-control" id="description" name="description" rows="4">{{$subCategory->description}}</textarea>
                                    </div>
                                    <button style="float:right;" type="submit" class="btn btn-primary mr-2">Save</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <footer class="footer">
            <div class="d-sm-flex justify-content-center justify-content-sm-between">
                <span class="text-muted text-center text-sm-left d-block d-sm-inline-block">All rights reserved.</span>
            </div>
        </footer>
    </div>
@endsection
