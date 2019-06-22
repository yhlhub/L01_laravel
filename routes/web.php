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
Route::get('/', 'PagesController@root')->name('root');//首页

Auth::routes(['verify' => true]);//登录、注册
// auth 中间件代表需要登录，verified中间件代表需要经过邮箱验证
Route::group(['middleware' => ['auth', 'verified']], function (){
    Route::get('user_addresses', 'UserAddressesController@index')->name('user_addresses.index');//收货地址列表
    Route::get('user_addresses/create', 'UserAddressesController@create')->name('user_addresses.create');//新增地址列表
    Route::post('user_addresses', 'UserAddressesController@store')->name('user_addresses.store');//保存收货地址
});
