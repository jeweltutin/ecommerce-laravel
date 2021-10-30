<?php

use Illuminate\Support\Facades\Route;
use App\Http\Livewire\HomeComponent;
use App\Http\Livewire\ShopComponent;
use App\Http\Livewire\ProductDetailsComponent;
use App\Http\Livewire\CartComponent;
use App\Http\Livewire\CheckoutComponent;
use App\Http\Livewire\CategoryComponent;
use App\Http\Livewire\WishListComponent;

use App\Http\Livewire\user\UserDashboardComponent;
use App\Http\Livewire\admin\AdminDashboardComponent;
use App\Http\Livewire\admin\AdminCategoryComponent;
use App\Http\Livewire\admin\AdminAddCategoryComponent;
use App\Http\Livewire\admin\AdminEditCategoryComponent;
use App\Http\Livewire\admin\AdminProductComponent;
use App\Http\Livewire\admin\AdminAddProductComponent;
use App\Http\Livewire\admin\AdminEditProductComponent;
use App\Http\Livewire\admin\AdminHomeSliderComponent;
use App\Http\Livewire\admin\AdminAddHomeSliderComponent;
use App\Http\Livewire\admin\AdminEditHomeSliderComponent;
use App\Http\Livewire\admin\AdminHomeCategoryComponent;
use App\Http\Livewire\admin\AdminSaleComponent;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

/*Route::get('/', function () {
    return view('welcome');
});*/ 

//Route::get('/test', [\App\Http\Controllers\CartController::class, 'index'])->name('cart.index');

Route::get('/', HomeComponent::class)->name('home');
Route::get('/shop', ShopComponent::class);
Route::get('/cart', CartComponent::class)->name('product.cart');
Route::get('/checkout', CheckoutComponent::class);
Route::get('/product/{slug}', ProductDetailsComponent::class)->name('product.details');
Route::get('/product-category/{category_slug}', CategoryComponent::class)->name('product.category');
Route::get('/wishlist', WishListComponent::class)->name('product.wishlist');

/*Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    return view('dashboard');
})->name('dashboard');*/

//For User or Customer
Route::middleware(['auth:sanctum', 'verified'])->group(function(){
    Route::get('/user/dashboard', UserDashboardComponent::class)->name('user.dashboard');
});

//For Admin
Route::middleware(['auth:sanctum', 'verified'])->group(function(){
    Route::get('/admin/dashboard', AdminDashboardComponent::class)->name('admin.dashboard');
    Route::get('/admin/categories', AdminCategoryComponent::class)->name('admin.categories');
    Route::get('/admin/category/add', AdminAddCategoryComponent::class)->name('admin.addcategories');
    Route::get('/admin/category/edit/{category_slug}', AdminEditCategoryComponent::class)->name('admin.editcategory');
    Route::get('/admin/products', AdminProductComponent::class)->name('admin.products');
    Route::get('/admin/product/add', AdminAddProductComponent::class)->name('admin.addproduct');
    Route::get('/admin/product/edit/{product_slug}', AdminEditProductComponent::class)->name('admin.editproduct');

    Route::get('/admin/home-slider', AdminHomeSliderComponent::class)->name('admin.homeslider');
    Route::get('/admin/home-slider/add', AdminAddHomeSliderComponent::class)->name('admin.addhomeslider');
    Route::get('/admin/home-slider/edit/{slide_id}', AdminEditHomeSliderComponent::class)->name('admin.edithomeslider');

    Route::get('/admin/home-categories', AdminHomeCategoryComponent::class)->name('admin.homecategories');
    Route::get('/admin/sale', AdminSaleComponent::class)->name('admin.sale');
});
