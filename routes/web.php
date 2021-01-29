<?php

use App\Http\Controllers\Auth\AuthController;
use App\Http\Controllers\nasimController;
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

Route::get('dashboard', function () {
    // return Auth::user();
    return view('layouts.main');
});

//Auth
Route::get('login', 'Auth\AuthController@login' )->name('login');
Route::post('loginconfirm', 'Auth\AuthController@authenticate' )->name('login.confirm');

//AuthCheckerGroup
Route::group(['middleware' => 'auth'] ,function(){

    //Logout
    Route::get('logout', 'Auth\AuthController@logout')->name('logout');

    //UserGroup Route
    Route::prefix('group')->group(function(){
        Route::get('view-group', 'User\UsergroupsController@index')->name('group-view');
        Route::get('create-group', 'User\UsergroupsController@create')->name('group-create');
        Route::post('store-group', 'User\UsergroupsController@store')->name('group-store');
        Route::delete('delete-group/{id}', 'User\UsergroupsController@destroy')->name('group-delete');
        Route::get('edit-group/{id}', 'User\UsergroupsController@edit')->name('group-edit');
        Route::post('update-group/{id}', 'User\UsergroupsController@update')->name('group-update');

    });

    //Users Route
    Route::resource('users', 'User\UsersController');

    //Users SaleInvoice
    Route::get('users/{id}/sales', 'User\UserSalesController@index')->name('user.sale');

    Route::post('users/{id}/invoice', 'User\UserSalesController@create')->name('user.sale.create');

    Route::get('users/{id}/invoice/{saleinvoice_id}', 'User\UserSalesController@invoices')->name('user.sale.invoice.details');

    Route::delete('users/{id}/invoice/{saleinvoice_id}', 'User\UserSalesController@invoiceDestroy')->name('user.sale.invoice.destroy');
    //Users SaleInvoice->Items
    Route::post('users/{id}/invoice/{saleinvoice_id}', 'User\UserSalesController@addItem')->name('user.invoice.additem');

    Route::delete( 'users/{id}/invoice/{saleinvoice_id}/{item_id}', 'User\UserSalesController@invoiceItemDestroy')->name('user.invoice.deleteitem');





    //user purchase
    Route::get('users/{id}/purchase', 'User\UserPurchaseController@index')->name('user.purchase');

    //user payment
    Route::get('users/{id}/payment', 'User\UserPaymentController@index')->name('user.payment');
    Route::post('user/{id}/payment', 'User\UserPaymentController@store')->name('user.payment.store');
    Route::delete('user/{id}/payment/{payment_id}', 'User\UserPaymentController@destroy')->name('user.payment.destroy');

    //user receipts
    Route::get('users/{id}/receipts', 'User\UserReceiptsController@index')->name('user.receipts');
    Route::post('user/{id}/receipts', 'User\UserReceiptsController@store' )->name('user.receipts.store');
    Route::delete('user/{id}/receipts/{receipts_id}', 'User\UserReceiptsController@destroy' )->name('user.receipts.destroy');


    //Product:categoris
    Route::resource('categories', 'Product\ProductController')->except([
        'show'
    ]);

    //Products:All Products
    Route::resource('product', 'Product\MainProductController');

});








