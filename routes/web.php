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

// Product Details
Route::get('/product/details/{id}/{product_name}','ProductController@productView');
Route::post('/cart/product/add/{id}', 'ProductController@AddCart');