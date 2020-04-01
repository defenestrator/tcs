<?php

use Illuminate\Support\Facades\Route;

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

Route::get('/', function () {
    return view('welcome');
});
Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');


Route::resource('breeder', 'BreederController');

Route::resource('cart', 'CartController');

Route::resource('content', 'ContentController');

Route::resource('comment', 'CommentController');

Route::resource('coupon', 'CouponController');

Route::resource('image', 'ImageController');

Route::resource('invoice', 'InvoiceController');

Route::resource('laboratory', 'LaboratoryController');

Route::resource('manufacturer', 'ManufacturerController');

Route::resource('lab-result', 'LabResultController');

Route::resource('order', 'OrderController');

Route::resource('product-category', 'ProductCategoryController');

Route::resource('product', 'ProductController');

Route::resource('shipment', 'ShipmentController');

Route::resource('shipping-address', 'ShippingAddressController');

Route::resource('shipping-carrier', 'ShippingCarrierController');

Route::resource('strain', 'StrainController');

Route::resource('tag', 'TagController');

Route::resource('user', 'UserController');


Route::resource('breeder', 'BreederController');

Route::resource('cart', 'CartController');

Route::resource('content', 'ContentController');

Route::resource('comment', 'CommentController');

Route::resource('coupon', 'CouponController');

Route::resource('image', 'ImageController');

Route::resource('invoice', 'InvoiceController');

Route::resource('laboratory', 'LaboratoryController');

Route::resource('manufacturer', 'ManufacturerController');

Route::resource('lab-result', 'LabResultController');

Route::resource('order', 'OrderController');

Route::resource('product-category', 'ProductCategoryController');

Route::resource('product', 'ProductController');

Route::resource('shipment', 'ShipmentController');

Route::resource('shipping-address', 'ShippingAddressController');

Route::resource('shipping-carrier', 'ShippingCarrierController');

Route::resource('strain', 'StrainController');

Route::resource('tag', 'TagController');

Route::resource('user', 'UserController');


Route::resource('breeder', 'BreederController');

Route::resource('cart', 'CartController');

Route::resource('comment', 'CommentController');

Route::resource('content', 'ContentController');

Route::resource('coupon', 'CouponController');

Route::resource('image', 'ImageController');

Route::resource('invoice', 'InvoiceController');

Route::resource('laboratory', 'LaboratoryController');

Route::resource('lab-result', 'LabResultController');

Route::resource('manufacturer', 'ManufacturerController');

Route::resource('order', 'OrderController');

Route::resource('product', 'ProductController');

Route::resource('product-category', 'ProductCategoryController');

Route::resource('shipment', 'ShipmentController');

Route::resource('shipping-address', 'ShippingAddressController');

Route::resource('shipping-carrier', 'ShippingCarrierController');

Route::resource('strain', 'StrainController');

Route::resource('tag', 'TagController');

Route::resource('user', 'UserController');


Route::resource('breeder', 'BreederController');

Route::resource('cart', 'CartController');

Route::resource('comment', 'CommentController');

Route::resource('content', 'ContentController');

Route::resource('coupon', 'CouponController');

Route::resource('image', 'ImageController');

Route::resource('invoice', 'InvoiceController');

Route::resource('laboratory', 'LaboratoryController');

Route::resource('lab-result', 'LabResultController');

Route::resource('manufacturer', 'ManufacturerController');

Route::resource('order', 'OrderController');

Route::resource('product', 'ProductController');

Route::resource('product-category', 'ProductCategoryController');

Route::resource('shipment', 'ShipmentController');

Route::resource('shipping-address', 'ShippingAddressController');

Route::resource('shipping-carrier', 'ShippingCarrierController');

Route::resource('strain', 'StrainController');

Route::resource('tag', 'TagController');

Route::resource('user', 'UserController');
