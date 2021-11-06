<?php

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

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('pages.index');
});
// Mail Verification
Auth::routes(['verify'=> true]);
Route::get('/home', 'HomeController@index')->name('home');

// Admin
Route::get('admin/home','AdminController@index');

// START ROUTES LOGIN

Route::get('/password-change', 'HomeController@changePassword')->name('password.change');
Route::post('/password-update', 'HomeController@updatePassword')->name('password.update');
Route::get('/user/logout', 'HomeController@Logout')->name('user.logout');

// ADMIN LOGIN

Route::get('admin', 'Admin\LoginController@showLoginForm')->name('admin.login');
Route::post('admin', 'Admin\LoginController@login');

   // Password Reset Routes...
Route::get('admin/password/reset', 'Admin\ForgotPasswordController@showLinkRequestForm')->name('admin.password.request');
Route::post('admin-password/email', 'Admin\ForgotPasswordController@sendResetLinkEmail')->name('admin.password.email');
Route::get('admin/reset/password/{token}', 'Admin\ResetPasswordController@showResetForm')->name('admin.password.reset');
Route::post('admin/update/reset', 'Admin\ResetPasswordController@reset')->name('admin.reset.update');
Route::get('/admin/Change/Password','AdminController@ChangePassword')->name('admin.password.change');
Route::post('/admin/password/update','AdminController@Update_pass')->name('admin.password.update'); 
Route::get('admin/logout', 'AdminController@logout')->name('admin.logout');

// END ROUTES LOGIN

// Categories
Route::get('admin/categories','Admin\Category\CategoryController@category')->name('categories');
Route::post('admin/store/category','Admin\Category\CategoryController@store')->name('store.category');
Route::get('delete/category/{id}','Admin\Category\CategoryController@destroy');
Route::get('edit/category/{id}','Admin\Category\CategoryController@edit');
Route::post('update/category/{id}','Admin\Category\CategoryController@update');

// Subcategories 
Route::get('admin/subcategories','Admin\Category\SubCategoryController@index')->name('subcategories');
Route::post('admin/store/subcategory','Admin\Category\SubCategoryController@store')->name('store.subcategory');
Route::get('delete/subcategory/{id}','Admin\Category\SubCategoryController@destroy');
Route::get('edit/subcategory/{id}','Admin\Category\SubCategoryController@edit');
Route::post('update/subcategory/{id}','Admin\Category\SubCategoryController@update');

// For Show Sub Category with ajax
Route::get('get/subcategory/{category_id}','Admin\ProductController@getSubcat');

// Brand
Route::get('admin/brands','Admin\Category\BrandController@index')->name('brands');
Route::post('admin/store/brand','Admin\Category\BrandController@store')->name('store.brand');
Route::get('delete/brand/{id}','Admin\Category\BrandController@destroy');
Route::get('edit/brand/{id}','Admin\Category\BrandController@edit');
Route::post('update/brand/{id}','Admin\Category\BrandController@update');

// Coupons
Route::get('admin/sub/coupons','Admin\Category\CouponController@index')->name('coupons');
Route::post('admin/store/coupon','Admin\Category\CouponController@store')->name('store.coupon');
Route::get('delete/coupon/{id}','Admin\Category\CouponController@destroy');
Route::get('edit/coupon/{id}','Admin\Category\CouponController@edit');
Route::post('update/coupon/{id}','Admin\Category\CouponController@update');

// Newslaters
Route::get('admin/newslater','Admin\Category\CouponController@newslater')->name('newslaters');
Route::get('delete/sub/{id}','Admin\Category\CouponController@destroynewslater');
// Fronted All routes
Route::post('store/newslater','FrontController@store')->name('store.newslater');

// Products
Route::get('admin/product/all','Admin\ProductController@index')->name('all.product');
Route::get('admin/product/add','Admin\ProductController@create')->name('add.product');
Route::post('admin/store/product','Admin\ProductController@store')->name('store.product');
// Status 
Route::get('inactive/product/{id}','Admin\ProductController@inactive');
Route::get('active/product/{id}','Admin\ProductController@active');

Route::get('delete/product/{id}','Admin\ProductController@destroy');
Route::get('view/product/{id}','Admin\ProductController@show');
Route::get('edit/product/{id}','Admin\ProductController@edit');
Route::post('update/product/withoutphoto/{id}', 'Admin\ProductController@UpdateProductWithoutPhoto');
Route::post('update/product/photo/{id}', 'Admin\ProductController@UpdateProductPhoto');

// Blog Admin All
Route::get('blog/category/list','Admin\PostController@blog')->name('add.blog.categorylist');
Route::post('admin/store/blog','Admin\PostController@blogstore')->name('store.blog.category');
Route::get('delete/blogcategory/{id}','Admin\PostController@destroyblog');
Route::get('edit/blogcategory/{id}','Admin\PostController@editblog');
Route::post('update/blogcategory/{id}', 'Admin\PostController@updateblog');
// Post
Route::get('admin/add/post','Admin\PostController@create')->name('add.blogpost');
Route::get('admin/list/post','Admin\PostController@index')->name('all.blogpost');
Route::post('admin/store/post','Admin\PostController@store')->name('store.post');
Route::get('delete/post/{id}','Admin\PostController@destroy');
Route::get('admin/edit/post/{id}','Admin\PostController@edit');
Route::post('update/post/{id}', 'Admin\PostController@update');

// Wishlist
Route::get('add/wishlist/{id}','WishlistController@add');

// Add to Cart
Route::get('add/to/cart/{id}','CartController@add');
Route::get('check','CartController@check');

Route::get('product/cart','CartController@showCart')->name('show.cart');
Route::get('remove/cart/{rowId}','CartController@removeCart');
Route::post('update/cart/item/', 'CartController@updateCart')->name('update.cartitem');

Route::get('/cart/product/view/{id}','CartController@viewProduct');
Route::post('insert/into/cart/', 'CartController@insertCart')->name('insert.into.cart');


Route::get('user/checkout/','CartController@Checkout')->name('user.checkout');
Route::get('user/wishlist/','CartController@wishlist')->name('user.wishlist');

// Coupon
Route::post('user/apply/coupon/', 'CartController@coupon')->name('apply.coupon');
Route::get('coupon/remove/', 'CartController@couponRemove')->name('coupon.remove');

// Product Details
Route::get('/product/details/{id}/{product_name}','ProductController@productView');
Route::post('/cart/product/add/{id}', 'ProductController@AddCart');

/// Blog Post Route
Route::get('blog/post/', 'BlogController@index')->name('blog.post');
Route::get('blog/single/{id}', 'BlogController@postSingle');

/// Languages
Route::get('language/english', 'BlogController@english')->name('language.english');
Route::get('language/hindi', 'BlogController@hindi')->name('language.hindi');

// Paymet Step
Route::get('payment/page', 'CartController@PaymentPage')->name('payment.step');
Route::post('user/payment/process/','PaymentController@Payment')->name('payment.process');
Route::post('user/stripe/charge/','PaymentController@StripeCharge')->name('stripe.charge');

// Products details Page
Route::get('products/{id}','ProductController@ProductsView');
Route::get('allcategory/{id}','ProductController@CategoryView');


// Admin Orders
Route::get('admin/pading/order','Admin\OrderController@newOrder')->name('admin.neworder');
Route::get('admin/view/order/{id}','Admin\OrderController@viewOrder');
Route::get('admin/payment/accept/{id}', 'Admin\OrderController@PaymentAccept');
Route::get('admin/payment/cancel/{id}', 'Admin\OrderController@paymentCancel');
Route::get('admin/accept/payment','Admin\OrderController@AcceptPayment')->name('admin.accept.payment');
Route::get('admin/cancel/order','Admin\OrderController@CancelOrder')->name('admin.cancel.order');
Route::get('admin/payment/proccess','Admin\OrderController@ProccessPayment')->name('admin.proccess.payment');
Route::get('admin/payment/succcess','Admin\OrderController@SuccessPayment')->name('admin.success.payment');

Route::get('admin/delivery/proccess/{id}','Admin\OrderController@DeliveryProccess');
Route::get('admin/delivery/done/{id}','Admin\OrderController@DeliveryDone');

// Seo Setting
Route::get('admin/seo', 'Admin\SeoController@index')->name('admin.seo.index');
Route::get('admin/seo/create', 'Admin\SeoController@create')->name('admin.seo.create');
Route::post('admin/seo/create', 'Admin\SeoController@store')->name('admin.seo.store');
Route::get('admin/seo/edit/{id}', 'Admin\SeoController@edit');
Route::post('admin/seo/update/{id}', 'Admin\SeoController@update')->name('admin.seo.update');
Route::get('admin/seo/delete/{id}', 'Admin\SeoController@destroy');

// Order Tracking
Route::post('admin/order/tracking', 'Admin\OrderController@tracking')->name('admin.order.tracking');

// Order Reports
Route::get('admin/order/report-today', 'Admin\ReportController@orderToday')->name('admin.report.ordertoday');
Route::get('admin/order/delivery-today', 'Admin\ReportController@orderDeliveryToday')->name('admin.report.deliverytoday');
Route::get('admin/order/this-month', 'Admin\ReportController@orderThisMonth')->name('admin.report.this.month');
Route::get('admin/order/search-report', 'Admin\ReportController@Search')->name('admin.report.search');

Route::post('admin/order/search/by-year', 'Admin\ReportController@SearchByYear')->name('search.by.year');
Route::post('admin/order/search/by-month', 'Admin\ReportController@SearchByMonth')->name('search.by.month');
Route::post('admin/order/search/by-date', 'Admin\ReportController@SearchByDate')->name('search.by.date');

// Admin Role
Route::get('admin/all/user', 'Admin\UserRoleController@UserRole')->name('admin.all.user');
Route::get('admin/create/admin', 'Admin\UserRoleController@UserCreate')->name('admin.create');
Route::post('admin/create/admin', 'Admin\UserRoleController@UserStore')->name('admin.store');
Route::get('admin/edit/admin/{id}', 'Admin\UserRoleController@UserEdit');
Route::get('admin/delete/admin/{id}', 'Admin\UserRoleController@UserDelete');
Route::post('admin/update/admin', 'Admin\UserRoleController@UserUpdate')->name('admin.update');


// Admin Site Settings
Route::get('admin/site/setting', 'Admin\SettingController@index')->name('admin.site.setting');
Route::post('admin/sitesetting', 'Admin\SettingController@update')->name('update.sitesetting');