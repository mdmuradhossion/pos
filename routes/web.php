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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

//Customer All Routes (start)
Route::get('customer', 'customerController@index');
Route::get('customerForm', 'customerController@create');
Route::post('customerstore', 'customerController@store');
Route::get('customer_view/{id}', 'customerController@show');
Route::get('customer_edit/{id}', 'customerController@edit');
Route::post('customer_update/{id}', 'customerController@update');
Route::post('customer_update_image/{id}', 'customerController@updateImage');
Route::get('customer_delete/{id}', 'customerController@destroy');
//Customer All Routes (end)

//Suppliers All Routes (start)
Route::get('supplier', 'supplierController@index');
Route::get('supplierForm', 'supplierController@create');
Route::post('supplierstore', 'supplierController@store');
Route::get('supplier_view/{id}', 'supplierController@show');
Route::get('supplier_edit/{id}', 'supplierController@edit');
Route::post('supplier_update/{id}', 'supplierController@update');
Route::post('supplier_update_image/{id}', 'supplierController@updateImage');
Route::get('supplier_delete/{id}', 'supplierController@destroy');
//Suppliers All Routes (start)

//Suppliers All Routes (start)
Route::get('accountholder', 'accountholderController@index');
Route::get('accountholderForm', 'accountholderController@create');
Route::post('accountholderstore', 'accountholderController@store');
Route::get('account_holder_view/{id}', 'accountholderController@show');
Route::get('account_holder_edit/{id}', 'accountholderController@edit');
Route::post('account_holder_update/{id}', 'accountholderController@update');
Route::post('account_holder_update_image/{id}', 'accountholderController@updateImage');
Route::get('account_holder_delete/{id}', 'accountholderController@destroy');
//Suppliers All Routes (start)

// Transection All Routes(Start)
Route::get('transaction', 'transactionController@index');
Route::get('transaction_form', 'transactionController@create');
Route::post('accountholder_transaction', 'transactionController@accountholder');
Route::get('view/{id}', 'transactionController@show');
// Transection All Routes(End)

//Pursess All Routes(Start)
Route::get('purchase', 'pursessController@index');
Route::get('purchase_form', 'pursessController@create');
Route::get('subcategorysearch', 'pursessController@categorysearch');
Route::post('addTocart', 'pursessController@cartAdd');
Route::get('clearcart', 'pursessController@clearCart');
Route::get('removecart/{id}', 'pursessController@removeCart');
Route::post('pruductPurchase', 'pursessController@store');
//Pursess All Routes(end)

//Sales All Routes(start)
Route::get('sales', 'salesController@index');
Route::get('sales_form', 'salesController@create');
Route::get('productSearch', 'salesController@productSearch');
Route::post('saleAddToCart', 'salesController@addToCart');
Route::get('removecartsale/{id}', 'salesController@removeCart');
Route::get('clearcartsale', 'salesController@clearCart');
Route::post('pruductSale', 'salesController@store');
//Sales All Routes(start)

//Products All Routes(start)
Route::get('products', 'productsController@index');
//Products All Routes(start)

//Category All Routes(start)
Route::get('category', 'categoryController@index');
Route::get('category_form', 'categoryController@create');
Route::post('categorystore', 'categoryController@store');
Route::get('category_view/{id}', 'categoryController@show');
Route::get('category_edit/{id}', 'categoryController@edit');
Route::post('category_update/{id}', 'categoryController@update');
//Category All Routes(start)

//Category All Routes(start)
Route::get('brand', 'brandController@index');
Route::get('brand_form', 'brandController@create');
Route::post('brandstore', 'brandController@store');
Route::get('brand_view/{id}', 'brandController@show');
Route::get('brand_edit/{id}', 'brandController@edit');
Route::post('brand_update/{id}', 'brandController@update');
Route::post('brand_update_image/{id}', 'brandController@updateImage');

//Category All Routes(start)

//Category All Routes(start)
Route::get('sattings', 'sattingsController@index');
//Category All Routes(start)


// ledgar All Routes(Start)
Route::get('shop_ledgar', 'ledgarController@index');
Route::get('customer_ledgar', 'ledgarController@customerLedgar');
Route::get('supplier_ledgar', 'ledgarController@supplierLedgar');
Route::get('account_holder_ledgar', 'ledgarController@accountHolderLedgar');
Route::get('suppliLedgSearch', 'ledgarController@supplierLedgarSearch');
Route::get('customerLedgSearch', 'ledgarController@customerLedgarSearch');
Route::get('accountholderLedgSearch', 'ledgarController@accountholderLedgarSearch');

// ledgar All Routes(Start)

Route::post('/rollCheck', 'rollCheck@index');
