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

// Create Route Group
Route::group(['middleware' => ['auth'], 'namespace' => 'Admin', 'prefix' => 'admin'], function() {
	Route::get('/dashboard', 'AdminDashboardController@index')->name('admin.dashboard.index');
	Route::get('/users', 'AdminUserController@index')->name('admin.users.index');
	Route::post('/users/delete', 'AdminUserController@delete')->name('admin.users.delete');
	Route::get('/users/view/{id}', 'AdminUserController@view')->name('admin.users.view');

	Route::match(['GET', 'POST'], '/profile', 'ProfileController@index')->name('admin.profile.index');
	Route::match(['GET', 'POST'], '/property/add', 'AdminPropertyController@add')->name('admin.property.add');

	Route::get('/property', 'AdminPropertyController@index')->name('admin.property.index');
	Route::post('/property/delete', 'AdminPropertyController@delete')->name('admin.property.delete');
	Route::match(['GET', 'POST'], '/property/edit/{id?}', 'AdminPropertyController@edit')->name('admin.property.edit');
	

});

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
