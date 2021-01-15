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

    //Product:categoris
    Route::resource('categories', 'Product\ProductController')->except([
        'show'
    ]);

    //Products:All Products
    Route::resource('product', 'Product\MainProductController');

});








