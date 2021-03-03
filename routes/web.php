<?php

use App\Http\Controllers\Auth\AuthController;
use App\Http\Controllers\Dashboard\DashboardController;
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



//Auth
Route::get('login', 'Auth\AuthController@login' )->name('login');
Route::post('loginconfirm', 'Auth\AuthController@authenticate' )->name('login.confirm');

//AuthCheckerGroup
Route::group(['middleware' => 'auth'] ,function(){

    //Logout
    Route::get('logout', 'Auth\AuthController@logout')->name('logout');

    //Dashboardss
    Route::get('/', 'Dashboard\DashboardController@index');
    Route::get('dashboard', 'Dashboard\DashboardController@index');

    // Route::get('dashboard', function () {
    //     // return Auth::user();
    //     $this->data['main_menu'] = '';
    //     $this->data['sub_menu'] = '';
    //     return view('layouts.main', $this->data);
    // });

    //UserGroup Route
    Route::prefix('group')->group(function(){
        Route::get('view-group',           'User\UsergroupsController@index')->name('group-view');
        Route::get('create-group',         'User\UsergroupsController@create')->name('group-create');
        Route::post('store-group',         'User\UsergroupsController@store')->name('group-store');
        Route::delete('delete-group/{id}', 'User\UsergroupsController@destroy')->name('group-delete');
        Route::get('edit-group/{id}',      'User\UsergroupsController@edit')->name('group-edit');
        Route::post('update-group/{id}',   'User\UsergroupsController@update')->name('group-update');

    });

    //Users Route
    Route::resource('users', 'User\UsersController');

    //Users SaleInvoice
    Route::get('users/{id}/sales',                                   'User\UserSalesController@index')->name('user.sale');
    Route::post('users/{id}/invoice',                                'User\UserSalesController@create')->name('user.sale.create');
    Route::get('users/{id}/invoice/{saleinvoice_id}',                'User\UserSalesController@invoices')->name('user.sale.invoice.details');
    Route::delete('users/{id}/invoice/{saleinvoice_id}',             'User\UserSalesController@invoiceDestroy')->name('user.sale.invoice.destroy');

    //Users SaleInvoice->Items
    Route::post('users/{id}/invoice/{saleinvoice_id}',               'User\UserSalesController@addItem')->name('user.invoice.additems');
    Route::delete( 'users/{id}/invoice/{saleinvoice_id}/{item_id}',  'User\UserSalesController@invoiceItemDestroy')->name('user.invoice.deleteitem');





    //user PurchaseInvoice
    Route::get('users/{id}/purchase',                                  'User\UserPurchaseController@index')->name('user.purchase');
    Route::post('users/{id}/purchase',                                 'User\UserPurchaseController@create')->name('user.purchase.create');
    Route::get('users/{id}/purchase/{purchaseinvoice_id}',                'User\UserPurchaseController@invoices')->name('user.purchase.invoice.details');
    Route::delete('users/{id}/purchase/{purchaseinvoice_id}',             'User\UserPurchaseController@invoiceDestroy')->name('user.purchase.invoice.destroy');

    //Users PurchaseInvoice->Items
    Route::post('users/{id}/purchase/{purchaseinvoice_id}',               'User\UserPurchaseController@addItem')->name('user.purchaseinvoice.additems');
    Route::delete( 'users/{id}/purchase/{purchaseinvoice_id}/{item_id}',  'User\UserPurchaseController@invoiceItemDestroy')->name('user.invoice.deletepurchaseitem');


    //user payment
    Route::get('users/{id}/payment',                'User\UserPaymentController@index')->name('user.payment');
    Route::post('user/{id}/payment/{purchaseinvoice_id?}',                'User\UserPaymentController@store')->name('user.payment.store');
    Route::delete('user/{id}/payment/{payment_id}', 'User\UserPaymentController@destroy')->name('user.payment.destroy');

    //user receipts
    Route::get('users/{id}/receipts',                   'User\UserReceiptsController@index')->name('user.receipts');
    Route::post('user/{id}/receipts/{saleinvoice_id?}', 'User\UserReceiptsController@store' )->name('user.receipts.store');
    Route::delete('user/{id}/receipts/{receipts_id}',   'User\UserReceiptsController@destroy' )->name('user.receipts.destroy');


    //Product:categoris
    Route::resource('categories', 'Product\ProductController')->except([
        'show'
    ]);

    //Products:All Products
    Route::resource('product', 'Product\MainProductController');
    Route::get('stock', 'Product\ProductStockController@index')->name('product.stock');

    //Reports
    Route::get('reports/sale', 'Reports\SaleReportsController@saleReports')->name('reports.sale');

    Route::get('reports/purchase', 'Reports\PurchaseReportsController@purchaseReports')->name('reports.purchase');

    Route::get('reports/payment', 'Reports\PaymentReportsController@paymentReports')->name('reports.payment');

    Route::get('reports/receipt', 'Reports\ReceiptReportsController@receiptReports')->name('reports.receipt');

});








