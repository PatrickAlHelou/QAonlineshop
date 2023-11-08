@extends('layouts.adminMainLayout')

@section('content')
    <div class="main-panel">
        <div class="content-wrapper">
            <div class="row">
                <div class="col-12 grid-margin stretch-card">
                    <div class="card">
                        <div class="card-body">
                            <h4 class="card-title">Adding New Product</h4>
                            <form method="POST" action="{{route('admin.product.store')}}" enctype="multipart/form-data">
                                @csrf
                                <div class="form-group">
                                    <label for="name">Name</label>
                                    <input type="text" class="form-control" id="name" name="name" placeholder="Name" value="{{old('name')}}">
                                    @error('name')
                                    <span class="text-danger" style="color: red">{{ $message }}</span>
                                    @enderror
                                </div>
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
                                    <textarea class="form-control" id="description" name="description" rows="4">{{old('description')}}</textarea>
                                </div>
                                <div class="form-group">
                                    <label for="price">Price</label>
                                    <input type="text" class="form-control" id="price" name="price" placeholder="Price"
                                           oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*)\./g, '$1');" value="{{old('price')}}">
                                    @error('price')
                                    <span class="text-danger" style="color: red">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="category_id">Category</label>
                                    <select class="form-control" onchange="categoryChange()" id="category_id" name="category_id">
                                        <option value="">Choose Category</option>
                                        @foreach($categories as $category)
                                            <option value="{{$category->id}}" @if(old('category_id') == $category->id) selected @endif>{{$category->name}}</option>
                                        @endforeach
                                    </select>
                                    @error('category_id')
                                    <span class="text-danger" style="color: red">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="sub_category_id">Sub Category</label>
                                    <select class="form-control" id="sub_category_id" name="sub_category_id">
                                        <option value="">Choose Sub Category</option>
{{--                                        @foreach($subCategories as $subCategory)--}}
{{--                                            <option value="{{$subCategory->id}}" @if(old('sub_category_id') == $subCategory->id) selected @endif>{{$subCategory->name}}</option>--}}
{{--                                        @endforeach--}}
                                    </select>
                                    @error('sub_category_id')
                                    <span class="text-danger" style="color: red">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="quantity">Quantity</label>
                                    <input type="text" class="form-control" id="quantity" name="quantity" placeholder="Quantity"
                                           oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*)\./g, '$1');" value="{{old('quantity')}}">
                                    @error('quantity')
                                    <span class="text-danger" style="color: red">{{ $message }}</span>
                                    @enderror
                                </div>
                                <button style="float:right;" type="submit" class="btn btn-primary mr-2">Create</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <script>
            function subCategoryRequest(selectedValue)
            {
                var xhr = new XMLHttpRequest();
                xhr.open("GET", "{{ route('admin.subcategory.request') }}?category_id=" + encodeURIComponent(selectedValue));
                xhr.onreadystatechange = function() {
                    if (xhr.readyState === XMLHttpRequest.DONE) {
                        if (xhr.status === 200) {
                            // alert(xhr.responseText);
                            $('#sub_category_id').html(xhr.responseText);
                        } else {
                            alert(xhr.status);
                        }
                    }
                };
                xhr.send();
            }

            function categoryChange() {
                var selectElement = document.querySelector('select[name="category_id"]');
                var selectedValue = selectElement.value;
                var subCategorySection = document.getElementById("sub_category_id");
                subCategorySection.innerHTML = "";
                if(selectedValue !== "")
                {
                    subCategoryRequest(selectedValue);
                }
            }
        </script>
        <footer class="footer">
            <div class="d-sm-flex justify-content-center justify-content-sm-between">
                <span class="text-muted text-center text-sm-left d-block d-sm-inline-block">All rights reserved.</span>
            </div>
        </footer>
    </div>
@endsection
