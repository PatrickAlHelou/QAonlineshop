<option value="">Choose Sub Category</option>
@foreach($subCategories as $subCategory)
    <option value="{{$subCategory->id}}" @if(old('sub_category_id') == $subCategory->id) selected @endif>{{$subCategory->name}}</option>
@endforeach
