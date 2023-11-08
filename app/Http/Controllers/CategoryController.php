<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class CategoryController extends Controller
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
        return view('admin.categoriesCreate');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name'=>'required',
            'image'=>'required|mimes:png,jpg,jpeg'
        ]);

        $filename = time().'.'.$request->file('image')->extension();
        $request->file('image')->storeAs('public/images',$filename);

        $category = new Category();
        $category->name = $request->name;
        $category->image = 'storage/images/'.$filename;
        $category->description = $request->description;

        $category->save();
        return redirect(route('admin.categories'));

    }

    /**
     * Display the specified resource.
     */
    public function show(Category $category)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $category = Category::find($id);
        return view('admin.categoriesEdit')
            ->with('category',$category);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'name'=>'required',
            'image'=>'required|mimes:png,jpg,jpeg'
        ]);
        $category = Category::find($id);


        $filename = time().'.'.$request->file('image')->extension();
        $request->file('image')->storeAs('public/images',$filename);

        if(File::exists($category->image)) {
            File::delete($category->image);
        }

        $category->name = $request->name;
        $category->image = 'storage/images/'.$filename;
        $category->description = $request->description;

        $category->save();
        return redirect(route('admin.categories'));

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $category = Category::find($id);
        $category->delete();
        return redirect(route('admin.categories'));
    }



}
