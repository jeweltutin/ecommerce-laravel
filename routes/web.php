<?php

use Illuminate\Support\Facades\Route;
use App\Http\Livewire\HomeComponent;
use App\Http\Livewire\ShopComponent;
use App\Http\Livewire\ProductDetailsComponent;
use App\Http\Livewire\CartComponent;
use App\Http\Livewire\CheckoutComponent;
use App\Http\Livewire\CategoryComponent;
use App\Http\Livewire\WishListComponent;
use App\Http\Livewire\ThankyouComponent;
use App\Http\Livewire\SearchComponent;
use App\Http\Livewire\ContactComponent;


use App\Http\Livewire\user\UserDashboardComponent;
use App\Http\Livewire\User\UserOrdersComponent;
use App\Http\Livewire\User\UserOrderDetailsComponent;
use App\Http\Livewire\User\UserReviewComponent;
use App\Http\Livewire\User\UserChangePasswordComponent;


use App\Http\Livewire\admin\AdminDashboardComponent;
use App\Http\Livewire\admin\AdminCategoryComponent;
use App\Http\Livewire\admin\AdminAddCategoryComponent;
use App\Http\Livewire\admin\AdminEditCategoryComponent;
use App\Http\Livewire\admin\AdminProductComponent;
use App\Http\Livewire\admin\AdminProductDetailsComponent;
use App\Http\Livewire\admin\AdminAddProductComponent;
use App\Http\Livewire\admin\AdminEditProductComponent;
use App\Http\Livewire\admin\AdminHomeSliderComponent;
use App\Http\Livewire\admin\AdminAddHomeSliderComponent;
use App\Http\Livewire\admin\AdminEditHomeSliderComponent;
use App\Http\Livewire\admin\AdminHomeCategoryComponent;
use App\Http\Livewire\admin\AdminSaleComponent;
use App\Http\Livewire\admin\AdminCouponsComponent;
use App\Http\Livewire\admin\AdminAddCouponComponent; 
use App\Http\Livewire\admin\AdminEditCouponComponent; 
use App\Http\Livewire\admin\AdminOrderComponent; 
use App\Http\Livewire\admin\AdminOrderDetailsComponent; 
use App\Http\Livewire\admin\AdminProductRatingReviewComponent; 
use App\Http\Livewire\admin\AdminUserComponent; 
use App\Http\Livewire\admin\AdminUserManageComponent; 
use App\Http\Livewire\admin\AdminContactComponent; 
use App\Http\Livewire\admin\AdminContactDetailsComponent; 
use App\Http\Livewire\admin\AdminSettingComponent; 

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
Route::get('/shop', ShopComponent::class)->name('shop');
Route::get('/cart', CartComponent::class)->name('product.cart');
Route::get('/checkout', CheckoutComponent::class)->name('checkout');
Route::get('/product/{slug}', ProductDetailsComponent::class)->name('product.details');
Route::get('/product-category/{category_slug}', CategoryComponent::class)->name('product.category');
Route::get('/wishlist', WishListComponent::class)->name('product.wishlist');
Route::get('/search', SearchComponent::class)->name('product.search');
Route::get('/thank-you', ThankyouComponent::class)->name('thankyou');
Route::get('/contact-us', ContactComponent::class)->name('contact');

/*Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    return view('dashboard');
})->name('dashboard');*/

//For User or Customer
Route::middleware(['auth:sanctum', 'verified'])->group(function(){
    Route::get('/user/dashboard', UserDashboardComponent::class)->name('user.dashboard');
    Route::get('/user/orders', UserOrdersComponent::class)->name('user.orders');
    Route::get('/user/order/{order_id}', UserOrderDetailsComponent::class)->name('user.orderdetails');
    Route::get('user/review/{order_item_id}', UserReviewComponent::class)->name('user.review');
    Route::get('/user/change-password', UserChangePasswordComponent::class)->name('user.changepassword');
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
    Route::get('/admin/product-details/{product_id}', AdminProductDetailsComponent::class)->name('admin.productdetails');

    Route::get('/admin/home-slider', AdminHomeSliderComponent::class)->name('admin.homeslider');
    Route::get('/admin/home-slider/add', AdminAddHomeSliderComponent::class)->name('admin.addhomeslider');
    Route::get('/admin/home-slider/edit/{slide_id}', AdminEditHomeSliderComponent::class)->name('admin.edithomeslider');

    Route::get('/admin/home-categories', AdminHomeCategoryComponent::class)->name('admin.homecategories');
    Route::get('/admin/sale', AdminSaleComponent::class)->name('admin.sale');

    Route::get('/admin/coupons', AdminCouponsComponent::class)->name('admin.coupons');
    Route::get('/admin/coupon/add', AdminAddCouponComponent::class)->name('admin.addcoupon');
    Route::get('/admin/coupon/edit/{coupon_id}', AdminEditCouponComponent::class)->name('admin.editcoupon');

    Route::get('/admin/orders', AdminOrderComponent::class)->name('admin.orders');
    Route::get('/admin/order/{order_id}', AdminOrderDetailsComponent::class)->name('admin.orderdetails');

    Route::get('/admin/product/rating-review', AdminProductRatingReviewComponent::class)->name('admin.productratingreview');

    Route::get('/admin/users', AdminUserComponent::class)->name('admin.users');
    Route::get('/admin/user/manage/{user_id}', AdminUserManageComponent::class)->name('admin.usermanage');

    Route::get('/admin/contact-us', AdminContactComponent::class)->name('admin.contact');
    Route::get('/admin/contact-details/{contact_id}', AdminContactDetailsComponent::class)->name('admin.contactdetails');

    Route::get('/admin/settings', AdminSettingComponent::class)->name('admin.settings');
});
