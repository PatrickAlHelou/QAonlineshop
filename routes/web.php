<?php

use App\Http\Controllers\AdminController;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return redirect(\route('admin.index'));
});

//Route::resource('/admin', AdminController::class);
Route::get('/admin', [App\Http\Controllers\AdminController::class, 'index'])->name('admin.index');
//Route::prefix('admin')->group(function () {
//    Route::get('manage/users/list', [App\Http\Controllers\AdminController::class, 'usersList'])->name('admin.usersList');
//    Route::get('manage/orders', [App\Http\Controllers\AdminController::class, 'ordersList'])->name('admin.ordersList');
//    Route::get('manage/orderHistory', [App\Http\Controllers\AdminController::class, 'orderHistory'])->name('admin.orderHistory');
//    Route::get('manage/inventory', [App\Http\Controllers\AdminController::class, 'inventory'])->name('admin.inventory');
//    Route::get('manage/categories', [App\Http\Controllers\AdminController::class, 'categories'])->name('admin.categories');
//    Route::get('manage/subCategories', [App\Http\Controllers\AdminController::class, 'subCategories'])->name('admin.subCategories');
//});

Route::get('manage/categories', [App\Http\Controllers\AdminController::class, 'categories'])->name('admin.categories');
Route::get('manage/create/categories', [App\Http\Controllers\CategoryController::class, 'create'])->name('admin.categories.create');
Route::post('manage/store/categories', [App\Http\Controllers\CategoryController::class, 'store'])->name('admin.categories.store');
Route::get('manage/edit/categories{id}', [App\Http\Controllers\CategoryController::class, 'edit'])->name('admin.categories.edit');
Route::post('manage/update/categories{id}', [App\Http\Controllers\CategoryController::class, 'update'])->name('admin.categories.update');
Route::get('manage/delete/categories{id}', [App\Http\Controllers\CategoryController::class, 'destroy'])->name('admin.categories.delete');

Route::get('manage/subCategories', [App\Http\Controllers\AdminController::class, 'subCategories'])->name('admin.subCategories');
Route::get('manage/create/subCategories', [App\Http\Controllers\SubCategoryController::class, 'create'])->name('admin.subCategories.create');
Route::post('manage/store/subCategories', [App\Http\Controllers\SubCategoryController::class, 'store'])->name('admin.subCategories.store');
Route::get('manage/edit/subCategories{id}', [App\Http\Controllers\SubCategoryController::class, 'edit'])->name('admin.subCategories.edit');
Route::post('manage/update/subCategories{id}', [App\Http\Controllers\SubCategoryController::class, 'update'])->name('admin.subCategories.update');
Route::get('manage/delete/subCategories{id}', [App\Http\Controllers\SubCategoryController::class, 'destroy'])->name('admin.subCategories.delete');

Route::get('manage/inventory', [App\Http\Controllers\AdminController::class, 'inventory'])->name('admin.inventory');
Route::get('manage/subCategory/request', [App\Http\Controllers\ProductController::class, 'subcategoryRequest'])->name('admin.subcategory.request');
Route::get('manage/create/product', [App\Http\Controllers\ProductController::class, 'create'])->name('admin.product.create');
Route::post('manage/store/product', [App\Http\Controllers\ProductController::class, 'store'])->name('admin.product.store');
Route::get('manage/edit/product{id}', [App\Http\Controllers\ProductController::class, 'edit'])->name('admin.product.edit');
Route::post('manage/update/product{id}', [App\Http\Controllers\ProductController::class, 'update'])->name('admin.product.update');
Route::get('manage/delete/product{id}', [App\Http\Controllers\ProductController::class, 'destroy'])->name('admin.product.delete');

Route::get('manage/users', [App\Http\Controllers\AdminController::class, 'usersList'])->name('admin.usersList');
Route::get('manage/create/user', [App\Http\Controllers\AdminController::class, 'create'])->name('admin.user.create');
Route::get('manage/view/product{id}', [App\Http\Controllers\ProductController::class, 'show'])->name('admin.product.view');
Route::post('manage/store/user', [App\Http\Controllers\AdminController::class, 'store'])->name('admin.user.store');
Route::get('manage/edit/user{id}', [App\Http\Controllers\AdminController::class, 'edit'])->name('admin.user.edit');
Route::post('manage/update/user{id}', [App\Http\Controllers\AdminController::class, 'update'])->name('admin.user.update');
Route::get('manage/delete/user{id}', [App\Http\Controllers\AdminController::class, 'destroy'])->name('admin.user.delete');
Route::get('admin/user/search', [App\Http\Controllers\AdminController::class ,'searchUsers'])->name('admin.user.search');

Route::get('manage/orders', [App\Http\Controllers\AdminController::class, 'ordersList'])->name('admin.ordersList');
Route::get('manage/orders/detail{id}', [App\Http\Controllers\AdminController::class, 'orderDetail'])->name('admin.orders.detail');
Route::get('manage/orderHistory', [App\Http\Controllers\AdminController::class, 'orderHistory'])->name('admin.orderHistory');
Route::get('/manage/orders/changeStatus', function () {
    $id = $_GET['id'];
    $status = $_GET['status'];
    $res = DB::table('orders')
        ->where('id', $id)
        ->update(['status' => $status]);

    return response()->json([
        'updated' => $res,
    ]);
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

//Filter User
Route::get('admin/user/search', [App\Http\Controllers\AdminController::class ,'searchUsers'])->name('admin.user.search');
Route::delete('/manage/delete/user/{id}', [App\Http\Controllers\AdminController::class ,'destroy'])->name('admin.user.delete');

//Filter Inventory
Route::get('admin/product/search', [App\Http\Controllers\AdminController::class ,'searchInventory'])->name('admin.product.searchInventory');

//Notification
Route::get('/notification', [App\Http\Controllers\NotificationController::class, 'index'])->name('notification');
Route::delete('/notification/{id}', [App\Http\Controllers\NotificationController::class, 'destroy'])->name('admin.notification.delete');

//Filter Orders
Route::get('/admin/orders/search', [App\Http\Controllers\AdminController::class , 'searchOrder'])->name('admin.orders.search');

//Filer inventory
Route::get('/admin/inventory/search', [App\Http\Controllers\AdminController::class , 'searchInventory'])->name('admin.inventory.search');

//Filter category
Route::get('/admin/category/search', [App\Http\Controllers\AdminController::class , 'searchCategory'])->name('admin.category.search');

//Filter Subcategory
Route::get('/admin/subcategory/search', [App\Http\Controllers\AdminController::class , 'searchSubCategory'])->name('admin.subcategory.search');
