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
	
	Route::get('/', 'DashboardController@index')->name('dashboard');
	
	Route::group(['namespace' => 'Banking', 'prefix' => 'banking', 'as' => 'banking.', 'middleware' => []], function () {
		Route::resource('feeds', 'FeedController');
		Route::resource('rules', 'RuleController');
		Route::resource('receipts', 'ReceiptController');
	});
	
	Route::group(['namespace' => 'Expenses', 'prefix' => 'expenses', 'as' => 'expenses.', 'middleware' => []], function () {
		Route::resource('purchases', 'PurchaseOrderController');
		Route::resource('bills', 'BillController');
		Route::resource('checks', 'CheckController');
		Route::resource('vendors', 'VendorController');
	});
	
	Route::group(['namespace' => 'Sales', 'prefix' => 'sales', 'as' => 'sales.', 'middleware' => []], function () {
		Route::resource('estimates', 'EstimateController');
		Route::resource('invoices', 'InvoiceController');
		Route::resource('payments', 'PaymentController');
		Route::resource('deposits', 'DepositController');
		Route::resource('customers', 'CustomerController');
		
	});
	
	Route::group(['namespace' => 'Inventory', 'prefix' => 'inventory', 'as' => 'inventory.', 'middleware' => []], function () {
		Route::resource('items', 'ItemController');
		Route::resource('categories', 'ItemCategoryController');
		
		// Custom Routes
		Route::get('items/{item}/activate', 'ItemController@activate')->name('items.activate');
		Route::get('items/{item}/deactivate', 'ItemController@deactivate')->name('items.deactivate');
	});
	
	Route::group(['namespace' => 'Projects', 'middleware' => []], function () {
		Route::resource('projects', 'ProjectController');
	});
	
	Route::group(['namespace' => 'Workers', 'prefix' => 'workers', 'as' => 'workers.', 'middleware' => []], function () {
		Route::resource('payroll', 'PayrollController');
		Route::resource('employees', 'EmployeeController');
		Route::resource('contractors', 'ContractorController');
	});
	
	Route::group(['namespace' => 'Reports', 'middleware' => []], function () {
		Route::resource('reports', 'ReportController');
	});
	
	Route::group(['namespace' => 'Taxes', 'prefix' => 'taxes', 'as' => 'taxes.', 'middleware' => []], function () {
		Route::resource('sales', 'SalesTaxController');
		Route::resource('payroll', 'PayrollTaxController');
	});
	
	Route::group(['namespace' => 'Accounting', 'prefix' => 'accounting', 'as' => 'accounting.', 'middleware' => []], function () {
		Route::resource('chartOfAccounts', 'ChartOfAccountController');
		Route::resource('reconcile', 'ReconcileController');
		
		// Custom Routes
		Route::get('chartOfAccounts/{account}/activate', 'AccountController@activate')->name('chartOfAccounts.activate');
		Route::get('chartOfAccounts/{account}/deactivate', 'AccountController@deactivate')->name('chartOfAccounts.deactivate');
		Route::get('chartOfAccounts/{account}/register', 'AccountController@register')->name('chartOfAccounts.register');
		Route::put('chartOfAccounts/{account}/register', 'AccountController@register_update')->name('chartOfAccounts.register.update');
	});
	
	Auth::routes();