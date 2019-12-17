<?php
	
	namespace App\Http\Controllers\Accounting;
	
	use App\Http\Controllers\Controller;
	use App\Models\Account;
	use App\Models\AccountType;
	use App\Models\Log;
	use Illuminate\Http\Request;
	use Illuminate\Support\Facades\Auth;
	
	class ChartOfAccountController extends Controller
	{
		/**
		 * Display a listing of the resource.
		 *
		 * @param  \Illuminate\Http\Request $request
		 * @return \Illuminate\Http\Response
		 */
		public function index(Request $request)
		{
			$showInactive = (isset($request['showInactive'])) ? true : false;
			
			if ($showInactive)
				$accounts = Account::orderBy('number')->paginate();
			else
				$accounts = Account::orderBy('number')->whereStatus(true)->paginate();
			
			return view('pages.accounting.chartofaccounts.index', compact('accounts', 'showInactive'));
		}
		
		/**
		 * Show the form for creating a new resource.
		 *
		 * @return \Illuminate\Http\Response
		 */
		public function create()
		{
			$accountTypes = AccountType::orderBy('id')->get();
			return view('pages.accounting.chartofaccounts.create', compact('accountTypes'));
		}
		
		/**
		 * Store a newly created resource in storage.
		 *
		 * @param  \Illuminate\Http\Request $request
		 * @return \Illuminate\Http\Response
		 */
		public function store(Request $request)
		{
			// Create Account
			$account = Account::create([
				'number'  => $request['number'],
				'name'    => $request['name'],
				'type_id' => $request['type'],
			]);
			
			// Log Account Creation
			$log = Log::create([
				'user_id' => Auth::id(),
				'type'    => "Account",
				'message' => sprintf("%s ( %s ) Created Successfully by %s", $account->name, $account->number, Auth::user()->name)
			]);
			
			// Redirect
			if ($request['save'] == "new")
				$redirect = redirect()->back()->with('success', sprintf("%s ( %s ) Created Successfully", $account->name, $account->number));
			else
				$redirect = redirect()->route('accounting.chartOfAccounts.index')->with('success', sprintf("%s ( %s ) Created Successfully", $account->name, $account->number));
			
			return $redirect;
		}
		
		/**
		 * Display the specified resource.
		 *
		 * @param  Account $account
		 * @return \Illuminate\Http\Response
		 */
		public function show(Account $account)
		{
			//
		}
		
		/**
		 * Show the form for editing the specified resource.
		 *
		 * @param  Account $account
		 * @return \Illuminate\Http\Response
		 */
		public function edit(Account $account)
		{
			$accountTypes = AccountType::orderBy('id')->get();
			return view('account.edit', compact('accountTypes', 'account'));
		}
		
		/**
		 * Update the specified resource in storage.
		 *
		 * @param  \Illuminate\Http\Request $request
		 * @param  Account $account
		 * @return \Illuminate\Http\Response
		 */
		public function update(Request $request, Account $account)
		{
			// Create Account
			$account->number = $request['number'];
			$account->name = $request['name'];
			$account->type_id = $request['type'];
			$account->save();
			
			if (isset($request['page']))
				$page = $request['page'];
			
			// Log Account Creation
			$log = Log::create([
				'user_id' => Auth::id(),
				'type'    => "Account",
				'message' => sprintf("%s ( %s ) Updated Successfully by %s", $account->name, $account->number, Auth::user()->name)
			]);
			
			return redirect()->route('accounting.chartOfAccounts.index', (isset($page) ? ["page" => $page] : null))->with('success', sprintf("%s ( %s ) Updated Successfully", $account->name, $account->number));
		}
		
		/**
		 * Remove the specified resource from storage.
		 *
		 * @param  Account $account
		 * @return \Illuminate\Http\Response
		 */
		public function destroy(Account $account)
		{
			$account->delete();
			$redirect = redirect()->route('accounting.chartOfAccounts.index')->with('success', sprintf("%s ( %s ) Deleted", $account->name, $account->number));
			
		}
		
		/**
		 * Activate the specified resource from storage.
		 *
		 * @param  Account $account
		 * @return \Illuminate\Http\Response
		 */
		public function activate(Account $account)
		{
			$account->activate();
			
			// Log Account Creation
			$log = Log::create([
				'user_id' => Auth::id(),
				'type'    => "Account",
				'message' => sprintf("%s ( %s ) Activated Successfully by %s", $account->name, $account->number, Auth::user()->name)
			]);
			
			return redirect()->back()->with('success', sprintf("%s ( %s ) Activated", $account->name, $account->number));
		}
		
		/**
		 * Deactivate the specified resource from storage.
		 *
		 * @param  Account $account
		 * @return \Illuminate\Http\Response
		 */
		public function deactivate(Account $account)
		{
			$account->deactivate();
			
			// Log Account Creation
			$log = Log::create([
				'user_id' => Auth::id(),
				'type'    => "Account",
				'message' => sprintf("%s ( %s ) Deactivated Successfully by %s", $account->name, $account->number, Auth::user()->name)
			]);
			
			return redirect()->back()->with('success', sprintf("%s ( %s ) Deactivated", $account->name, $account->number));
		}
		
		public function register(Account $account)
		{
		
		}
	}
