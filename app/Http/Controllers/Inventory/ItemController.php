<?php
	
	namespace App\Http\Controllers\Inventory;
	
	use App\Http\Controllers\Controller;
	use App\Models\Account;
	use App\Models\AccountTransaction;
	use App\Models\Item;
	use App\Models\ItemCategory;
	use App\Models\ItemType;
	use Illuminate\Http\Request;
	
	class ItemController extends Controller
	{
		/**
		 * Display a listing of the resource.
		 *
		 * @return \Illuminate\Http\Response
		 */
		public function index(Request $request)
		{
			$showInactive = (isset($request['showInactive'])) ? true : false;
			$itemCategories = ItemCategory::where('parent_category_id', null)->orderBy('order', 'asc')->paginate(100);
			
			return view('inventory.item.index', compact('itemCategories', 'showInactive'));
		}
		
		/**
		 * Show the form for creating a new resource.
		 *
		 * @return \Illuminate\Http\Response
		 */
		public function create()
		{
			$incomeAccounts = Account::orderBy('id')->whereTypeId(1)->get();
			$assetAccounts = Account::orderBy('id')->whereTypeId(4)->get();
			$expenseAccounts = Account::orderBy('id')->whereTypeId(2)->get();
			$itemTypes = ItemType::orderBy('id')->get();
			$itemCategories = ItemCategory::orderBy('id')->get();
			return view('inventory.item.create', compact('itemTypes', 'itemCategories', 'incomeAccounts', 'assetAccounts', 'expenseAccounts'));
		}
		
		/**
		 * Store a newly created resource in storage.
		 *
		 * @param  \Illuminate\Http\Request $request
		 * @return \Illuminate\Http\Response
		 */
		public function store(Request $request)
		{
			$item = Item::create([
				'item_type_id'         => $request['item_type_id'],
				'item_category_id'     => $request['item_category_id'],
				'name'                 => $request['name'],
				'sku'                  => $request['sku'],
				'unit_price'           => $request['unit_price'],
				'purchase_cost'        => $request['purchase_cost'],
				'description'          => $request['description'],
				'purchase_description' => $request['purchase_description'],
				'income_account_id'    => $request['income_account_id'],
				'asset_account_id'     => $request['asset_account_id'],
				'expense_account_id'   => $request['expense_account_id'],
				'taxable'              => (isset($request['taxable'])) ? true : false,
				'inventory_start_date' => (isset($request['inventory_start_date'])) ? $request['inventory_start_date'] : null,
				'qty_on_hand'          => $request['qty_on_hand'],
				'purchase'             => (isset($request['purchase'])) ? true : false,
				'track_qty_on_hand'    => ($request['item_type_id'] == 3) ? true : false,
				'active'               => true,
			]);
			
			if ($item->asset_account_id != null) {
				$accountTransaction = AccountTransaction::create([
					'account_id' => $item->asset_account_id,
					'amount'     => $item->purchase_cost * $item->qty_on_hand
				]);
			}
			
			// Redirect
			if ($request['save'] == "new")
				$redirect = redirect()->back()->with('success', sprintf("%s ( %s ) Created Successfully", $item->name, $item->id));
			else
				$redirect = redirect()->route('inventory.items.index')->with('success', sprintf("%s ( %s ) Created Successfully", $item->name, $item->id));
			
			return $redirect;
		}
		
		/**
		 * Display the specified resource.
		 *
		 * @param  \App\Models\Item $item
		 * @return \Illuminate\Http\Response
		 */
		public function show(Item $item)
		{
			//
		}
		
		/**
		 * Show the form for editing the specified resource.
		 *
		 * @param  \App\Models\Item $item
		 * @return \Illuminate\Http\Response
		 */
		public function edit(Item $item)
		{
			$incomeAccounts = Account::orderBy('id')->whereTypeId(1)->get();
			$assetAccounts = Account::orderBy('id')->whereTypeId(4)->get();
			$expenseAccounts = Account::orderBy('id')->whereTypeId(2)->get();
			$itemTypes = ItemType::orderBy('id')->get();
			$itemCategories = ItemCategory::orderBy('id')->get();
			return view('inventory.item.edit', compact('itemTypes', 'itemCategories', 'incomeAccounts', 'assetAccounts', 'expenseAccounts', 'item'));
			
		}
		
		/**
		 * Update the specified resource in storage.
		 *
		 * @param  \Illuminate\Http\Request $request
		 * @param  \App\Models\Item $item
		 * @return \Illuminate\Http\Response
		 */
		public function update(Request $request, Item $item)
		{
			// Move Account Transactions
			if ($request['asset_account_id'] != $item->asset_account_id) {
				$accountTransactions = AccountTransaction::whereItemId($item->id)->whereAccountId($item->asset_account_id)->get();
				foreach ($accountTransactions as $accountTransaction) {
					$accountTransaction->account_id = $request['asset_account_id'];
					$accountTransaction->save();
				}
			}
			
			// Update Item
			$item->item_category_id = $request['item_category_id'];
			$item->name = $request['name'];
			$item->sku = $request['sku'];
			$item->unit_price = $request['unit_price'];
			$item->purchase_cost = $request['purchase_cost'];
			$item->description = $request['description'];
			$item->purchase_description = $request['purchase_description'];
			$item->income_account_id = $request['income_account_id'];
			$item->asset_account_id = $request['asset_account_id'];
			$item->expense_account_id = $request['expense_account_id'];
			$item->taxable = (isset($request['taxable'])) ? true : false;
			$item->purchase = (isset($request['purchase'])) ? true : false;
			$item->save();
			
			return redirect()->route('inventory.items.index')->with('success', sprintf("%s ( %s ) Created Updated", $item->name, $item->id));
			
		}
		
		/**
		 * Remove the specified resource from storage.
		 *
		 * @param  \App\Models\Item $item
		 * @return \Illuminate\Http\Response
		 */
		public function destroy(Item $item)
		{
			//
		}
		
		/**
		 * Activate the specified resource from storage.
		 *
		 * @param  AItem $item
		 * @return \Illuminate\Http\Response
		 */
		public function activate(Item $item)
		{
			$item->activate();
			
			
			return redirect()->back()->with('success', sprintf("%s ( %s ) Activated", $item->name, $item->id));
		}
		
		/**
		 * Deactivate the specified resource from storage.
		 *
		 * @param  Item $item
		 * @return \Illuminate\Http\Response
		 */
		public function deactivate(Item $item)
		{
			$item->deactivate();
			
			return redirect()->back()->with('success', sprintf("%s ( %s ) Deactivated", $item->name, $item->id));
		}
	}
