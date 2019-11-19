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
	Route::resource('account', 'AccountController');
	Route::get('account/{account}/activate', 'AccountController@activate')->name('account.activate');
	Route::get('account/{account}/deactivate', 'AccountController@deactivate')->name('account.deactivate');
	Route::get('account/{account}/register', 'AccountController@register')->name('account.register');
	Route::put('account/{account}/register', 'AccountController@register_update')->name('account.register.update');
