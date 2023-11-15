<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Inventory;
use App\Models\Product;
use App\Models\SubCategory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class ProductController extends Controller
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
        $subCategories = SubCategory::all();
        return view('admin.productCreate')
            ->with('categories',$categories)
            ->with('subCategories',$subCategories);
    }

    public function subcategoryRequest()
    {
//        $box_data = new Box();
//        $category = Donor::find(request('donor_id'));
        $subCategories = SubCategory::where('category_id','=',request('category_id'))->get();

        return view('admin.partials.subCategorySection', compact('subCategories'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name'=>'required',
            'price'=>'required',
            'image'=>'required|mimes:png,jpg,jpeg',
            'category_id'=>'required',
            'sub_category_id'=>'required',
            'quantity'=>'required'
        ]);

        $filename = time().'.'.$request->file('image')->extension();
        $request->file('image')->storeAs('public/images/products',$filename);

        $product = new Product();
        $product->name = $request->name;
        $product->price = $request->price;
        $product->image = 'storage/images/products/'.$filename;
        $product->description = $request->description;
        $product->category_id = $request->category_id;
        $product->sub_category_id = $request->sub_category_id;
        $product->save();

        $inventory = new Inventory();
        $inventory->product_id = $product->id;
        $inventory->quantity = $request->quantity;
        $inventory->save();

        return redirect(route('admin.inventory'));
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $product = Product::find($id);
        $category = Category::where('id','=',$product->category_id)->first();
        $subCategory = SubCategory::where('id','=',$product->sub_category_id)->first();
        return view('admin.productView')
            ->with('product',$product)
            ->with('category',$category)
            ->with('subCategory',$subCategory);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $product = Product::find($id);
        $inventory = Inventory::where('product_id','=',$product->id)->first();
        $categories = Category::all();
        $subCategories = SubCategory::where('category_id','=',$product->category_id)->get();
        return view('admin.productEdit')
            ->with('product',$product)
            ->with('inventory',$inventory)
            ->with('categories',$categories)
            ->with('subCategories',$subCategories);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        if($request->image)
        {
            $request->validate([
                'name'=>'required',
                'price'=>'required',
                'image'=>'required|mimes:png,jpg,jpeg',
                'category_id'=>'required',
                'sub_category_id'=>'required',
                'quantity'=>'required'
            ]);
        }
        else
        {
            $request->validate([
                'name'=>'required',
                'price'=>'required',
                'category_id'=>'required',
                'sub_category_id'=>'required',
                'quantity'=>'required'
            ]);
        }

        $product = Product::find($id);

        $filename = "";
        if($request->image)
        {
            $filename = time().'.'.$request->file('image')->extension();
            $request->file('image')->storeAs('public/images/products',$filename);

            if(File::exists($product->image)) {
                File::delete($product->image);
            }

        }

        $product->name = $request->name;
        $product->price = $request->price;
        if($request->image)
        {
            $product->image = 'storage/images/products/'.$filename;
        }
        $product->description = $request->description;
        $product->category_id = $request->category_id;
        $product->sub_category_id = $request->sub_category_id;
        $product->save();

        $inventory = Inventory::where('product_id','=',$product->id)->first();
        $inventory->quantity = $request->quantity;
        $inventory->save();

        return redirect(route('admin.inventory'));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $product = Product::find($id);
        if(File::exists($product->image)) {
            File::delete($product->image);
        }
        $product->delete();

        return redirect(route('admin.inventory'));
    }
}
