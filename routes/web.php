<?php

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

Route::get('/', function () {
    return view('layouts.main');
});

Route::prefix('group')->group(function(){
    Route::get('view-group', 'User\UsergroupsController@index')->name('group-view');
    Route::get('create-group', 'User\UsergroupsController@create')->name('group-create');
    Route::post('store-group', 'User\UsergroupsController@store')->name('group-store');
    Route::delete('delete-group/{id}', 'User\UsergroupsController@destroy')->name('group-delete');
    Route::get('edit-group/{id}', 'User\UsergroupsController@edit')->name('group-edit');
    Route::post('update-group/{id}', 'User\UsergroupsController@update')->name('group-update');

});




