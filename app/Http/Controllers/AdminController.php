<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Inventory;
use App\Models\Order;
use App\Models\OrderDetails;
use App\Models\Product;
use App\Models\SubCategory;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\NotificationController;
use App\Models\Notification;

class AdminController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('admin.dashboardPage');
    }

    public function usersList()
    {
//        $users = User::where('isAdmin','=',0)->get();
        $users = User::where('id','!=',1)->get();
//        $users = User::all();
        return view('admin.manageUsers')
            ->with('users',$users);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.usersCreate');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'username'=>'required|unique:users',
            'first_name'=>'required',
            'last_name'=>'required',
            'email'=>'required|unique:users',
            'phone_number'=>'required|unique:users',
            'password'=>'required|min:8|confirmed',
        ]);

        $user = new User();
        $user->username = $request->username;
        $user->first_name = $request->first_name;
        $user->last_name = $request->last_name;
        $user->email = $request->email;
        $user->phone_number = $request->phone_number;
        $user->password = Hash::make($request->password);
        $user->isAdmin = $request->has('isAdmin') ? 1 : 0;
        $user->save();

        $notification = new Notification();
        $notification->username = $user->username;
        $notification->first_name = $user->first_name;
        $notification->last_name = $user->last_name;
        $notification->email = $user->email;
        $notification->save();

        return redirect(route('admin.usersList'));
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $user = User::find($id);
        return view('admin.usersEdit')
            ->with('user',$user);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $user = User::find($id);

        $request->validate([
            'username'=>'required|unique:users,username,' . $user->id,
            'first_name'=>'required',
            'last_name'=>'required',
            'email'=>'required|unique:users,email,' . $user->id,
            'phone_number'=>'required|unique:users,phone_number,' . $user->id,
            'password'=>'required|min:8|confirmed',
        ]);

        $user->username = $request->username;
        $user->first_name = $request->first_name;
        $user->last_name = $request->last_name;
        $user->email = $request->email;
        $user->phone_number = $request->phone_number;
        $user->password = Hash::make($request->password);
        $user->isAdmin = $request->has('isAdmin') ? 1 : 0;
        $user->save();

        return redirect(route('admin.usersList'));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $user = User::find($id);
        $user->delete();
        return redirect(route('admin.usersList'));
    }

    public function searchUsers(Request $request)
    {
        $query = $request->input('query');

        $users = User::where('username', 'like', "%$query%")
            ->orWhere('first_name', 'like', "%$query%")
            ->orWhere('last_name', 'like', "%$query%")
            ->orWhere('phone_number', 'like', "%$query%")
            ->orWhere('email', 'like', "%$query%")
            ->whereNotIn('isAdmin', ['1'])
            ->get();

        return view('admin.search_results', compact('users', 'query'));
    }

    public function ordersList()
    {
        $orders = Order::where('status','!=','Delivered')->get();
        $users = User::where('id','!=',1)->get();
        return view('admin.manageOrders',compact('orders','users'));
    }

    public function orderDetail($id)
    {
        $order = Order::find($id);
        $order_detail = OrderDetails::where('order_id','=',$order->id)->get();
        $products = Product::all();
        $user = User::where('id','=',$order->user_id)->first();
        return view('admin.orderDetail',compact('order','user','order_detail','products'));
    }

    public function changeStatus()
    {

    }

    public function list()
    {
        return view('admin.manageOrders');
    }
    public function orderHistory()
    {
        $orders = Order::where('status','=','Delivered')->get();
        $users = User::where('id','!=',1)->get();
        return view('admin.orderHistory',compact('orders','users'));
    }
    public function inventory()
    {
        $inventory = Inventory::all();
        $products = Product::all();
        $categories = Category::all();
        $subCategories = SubCategory::all();
        return view('admin.manageInventory')
            ->with('inventory',$inventory)
            ->with('products',$products)
            ->with('categories',$categories)
            ->with('subCategories',$subCategories);
    }
    public function categories()
    {
//        $categoriesWithSubcategoryCount = Category::withCount('subcategories')->get();
        $categories = Category::all();
        $subCategories = SubCategory::all();
        return view('admin.categories')
            ->with('categories',$categories)
            ->with('subCategories',$subCategories);
//            ->with('data',$categoriesWithSubcategoryCount);
    }
    public function subCategories()
    {
                $categories = Category::all();
                $subCategories = SubCategory::all();
                $products = Product::all();
                return view('admin.subCategories')
                    ->with('categories', $categories)
                    ->with('products',$products)
                    ->with('subCategories', $subCategories);
    }

    public function searchOrder(Request $request)
    {
        $searchTerm = $request->input('search');
        $orders = Order::whereHas('user', function ($query) use ($searchTerm) {
            $query->where('first_name', 'like', "%$searchTerm%")
                ->orWhere('last_name', 'like', "%$searchTerm%");
        })->get();
        $userIds = $orders->pluck('user_id')->unique()->toArray();
        $users = User::whereIn('id', $userIds)->get();

        return view('admin.search_result_order', compact('orders', 'users'));
    }

    public function searchInventory(Request $request)
    {
        $searchQuery = $request->input('query');

        $inventory = Inventory::query()
            ->join('products', 'products.id', '=', 'inventories.product_id')
            ->join('categories', 'categories.id', '=', 'products.category_id')
            ->join('sub_categories', 'sub_categories.id', '=', 'products.sub_category_id')
            ->where(function ($query) use ($searchQuery) {
                $query->where('products.name', 'LIKE', '%' . $searchQuery . '%')
                    ->orWhere('categories.name', 'LIKE', '%' . $searchQuery . '%')
                    ->orWhere('sub_categories.name', 'LIKE', '%' . $searchQuery . '%');
            })
            ->get();

        $products = Product::all();
        $categories = Category::all();
        $subCategories = SubCategory::all();

        return view('admin.manageInventory')
            ->with('inventory', $inventory)
            ->with('products', $products)
            ->with('categories', $categories)
            ->with('subCategories', $subCategories);

    }

    public function searchCategory(Request $request)
    {
        $searchQuery = $request->input('query');

        $categories = Category::query()
            ->where('name', 'LIKE', '%' . $searchQuery . '%')
            ->get();

        $subCategories = SubCategory::all();

        return view('admin.categories')
            ->with('categories', $categories)
            ->with('subCategories', $subCategories);
    }

    public function searchSubCategory(Request $request)
    {
        $searchQuery = $request->input('query');

        $subCategories = SubCategory::query()
            ->where('name', 'LIKE', '%' . $searchQuery . '%')
            ->get();

        $categories = Category::all();
        $products = Product::all();

        return view('admin.subCategories')
            ->with('subCategories', $subCategories)
            ->with('categories', $categories)
            ->with('products', $products);
    }

}
