<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\SubCategory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class SubCategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $categories = Category::all();
        return view('admin.subCategoriesCreate')
            ->with('categories',$categories);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name'=>'required',
            'category_id'=>'required',
            'image'=>'required|mimes:png,jpg,jpeg'
        ]);

        $filename = time().'.'.$request->file('image')->extension();
        $request->file('image')->storeAs('public/images',$filename);

        $subCategory = new SubCategory();
        $subCategory->name = $request->name;
        $subCategory->category_id = $request->category_id;
        $subCategory->image = 'storage/images/'.$filename;
        $subCategory->description = $request->description;

        $subCategory->save();
        return redirect(route('admin.subCategories'));
    }

    /**
     * Display the specified resource.
     */
    public function show(SubCategory $subCategory)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $subCategory = SubCategory::find($id);
        $categories = Category::all();
        return view('admin.subCategoriesEdit')
            ->with('subCategory',$subCategory)
            ->with('categories',$categories);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'name'=>'required',
            'category_id'=>'required',
            'image'=>'required|mimes:png,jpg,jpeg'
        ]);
        $subCategory = SubCategory::find($id);


        $filename = time().'.'.$request->file('image')->extension();
        $request->file('image')->storeAs('public/images',$filename);

        if(File::exists($subCategory->image)) {
            File::delete($subCategory->image);
        }

        $subCategory->name = $request->name;
        $subCategory->category_id = $request->category_id;
        $subCategory->image = 'storage/images/'.$filename;
        $subCategory->description = $request->description;

        $subCategory->save();
        return redirect(route('admin.subCategories'));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $category = SubCategory::find($id);
        $category->delete();
        return redirect(route('admin.subCategories'));
    }
}
