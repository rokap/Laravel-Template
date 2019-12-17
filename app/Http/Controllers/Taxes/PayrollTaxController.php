<?php
	
	namespace App\Http\Controllers\Taxes;
	
	use App\Http\Controllers\Controller;
	use App\Models\PayrollTax;
	use Illuminate\Http\Request;
	
	class PayrollTaxController extends Controller
	{
		/**
		 * Display a listing of the resource.
		 *
		 * @return \Illuminate\Http\Response
		 */
		public function index()
		{
			return view('pages.taxes.payroll.index');
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
		 * @param  \App\Models\PayrollTax $payrollTax
		 * @return \Illuminate\Http\Response
		 */
		public function show(PayrollTax $payrollTax)
		{
			//
		}
		
		/**
		 * Show the form for editing the specified resource.
		 *
		 * @param  \App\Models\PayrollTax $payrollTax
		 * @return \Illuminate\Http\Response
		 */
		public function edit(PayrollTax $payrollTax)
		{
			//
		}
		
		/**
		 * Update the specified resource in storage.
		 *
		 * @param  \Illuminate\Http\Request $request
		 * @param  \App\Models\PayrollTax $payrollTax
		 * @return \Illuminate\Http\Response
		 */
		public function update(Request $request, PayrollTax $payrollTax)
		{
			//
		}
		
		/**
		 * Remove the specified resource from storage.
		 *
		 * @param  \App\Models\PayrollTax $payrollTax
		 * @return \Illuminate\Http\Response
		 */
		public function destroy(PayrollTax $payrollTax)
		{
			//
		}
	}
