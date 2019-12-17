<?php
	
	namespace App\Http\Controllers\Taxes;
	
	use App\Http\Controllers\Controller;
	use App\Models\SalesTax;
	use Illuminate\Http\Request;
	
	class SalesTaxController extends Controller
	{
		/**
		 * Display a listing of the resource.
		 *
		 * @return \Illuminate\Http\Response
		 */
		public function index()
		{
			return view('pages.taxes.sales.index');
		}
		
		/**
		 * Show the form for creating a new resource.
		 *
		 * @return \Illuminate\Http\Response
		 */
		public function create()
		{
			//
		}
		
		/**
		 * Store a newly created resource in storage.
		 *
		 * @param  \Illuminate\Http\Request $request
		 * @return \Illuminate\Http\Response
		 */
		public function store(Request $request)
		{
			//
		}
		
		/**
		 * Display the specified resource.
		 *
		 * @param  \App\Models\SalesTax $salesTax
		 * @return \Illuminate\Http\Response
		 */
		public function show(SalesTax $salesTax)
		{
			//
		}
		
		/**
		 * Show the form for editing the specified resource.
		 *
		 * @param  \App\Models\SalesTax $salesTax
		 * @return \Illuminate\Http\Response
		 */
		public function edit(SalesTax $salesTax)
		{
			//
		}
		
		/**
		 * Update the specified resource in storage.
		 *
		 * @param  \Illuminate\Http\Request $request
		 * @param  \App\Models\SalesTax $salesTax
		 * @return \Illuminate\Http\Response
		 */
		public function update(Request $request, SalesTax $salesTax)
		{
			//
		}
		
		/**
		 * Remove the specified resource from storage.
		 *
		 * @param  \App\Models\SalesTax $salesTax
		 * @return \Illuminate\Http\Response
		 */
		public function destroy(SalesTax $salesTax)
		{
			//
		}
	}
