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
Auth::routes();

Route::get('/home', 'HomeController@index')->name('home')->middleware('auth');

Route::group(['middleware' => 'auth'], function () {

/* 	Route::get('table-list', function () {
    
		$users = DB::table('users')->get();
	 
		return view('pages.table_list', ['users' => $users]);
	})->name('table'); */

/* 	Route::get('adduser', function () {
		return view('users.add_user');
	})->name('adduser'); */

/* 	Route::get('/table-list', function () {

		$meals = DB::table('meals')->get();
        
        return view('pages.table_list', ['meals' => $meals]);
	})->name('table'); */


	Route::get('/table-list', 'MealController@index')->name('table');
	Route::get('/table-list2', 'WarehouseController@lazyLoad')->name('table2');

	Route::get('/table-test/{meal_id}/{value}', 'StockController@updateStockGeral');

	Route::get('/table-add', 'MealController@create');
	Route::post('table-add', 'MealController@store');

	Route::get('/table-edit/{id}', 'MealController@show');
	Route::post('table-edit/{id}', 'MealController@update');
	Route::get('/table-delete/{id}', 'MealController@destroy');



	Route::get('/adduser', 'UserController@create');
	Route::post('adduser', 'UserController@store');

	Route::get('typography', function () {
		return view('pages.typography');
	})->name('typography');

	Route::get('icons', function () {
		return view('pages.icons');
	})->name('icons');

	Route::get('map', function () {
		return view('pages.map');
	})->name('map');

	Route::get('notifications', function () {
		return view('pages.notifications');
	})->name('notifications');

	Route::get('rtl-support', function () {
		return view('pages.language');
	})->name('language');

	Route::get('upgrade', function () {
		return view('pages.upgrade');
	})->name('upgrade');
});

Route::group(['middleware' => 'auth'], function () {
	Route::resource('user', 'UserController', ['except' => ['show']]);
	Route::get('profile', ['as' => 'profile.edit', 'uses' => 'ProfileController@edit']);
	Route::put('profile', ['as' => 'profile.update', 'uses' => 'ProfileController@update']);
	Route::put('profile/password', ['as' => 'profile.password', 'uses' => 'ProfileController@password']);
});

