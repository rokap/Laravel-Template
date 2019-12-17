<?php
	
	namespace App\Models;
	
	use Illuminate\Database\Eloquent\Model;
	
	/**
 * App\Models\Item
 *
 * @property int $id
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property string $name
 * @property int $track_qty_on_hand
 * @property int $item_type_id
 * @property float $unit_price
 * @property float $purchase_cost
 * @property float|null $qty_on_hand
 * @property int $income_account_id
 * @property int|null $asset_account_id
 * @property int $expense_account_id
 * @property int $taxable
 * @property int $active
 * @property string|null $inventory_start_date
 * @property string|null $description
 * @property string|null $purchase_description
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Item newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Item newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Item query()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Item whereActive($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Item whereAssetAccountId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Item whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Item whereDescription($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Item whereExpenseAccountId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Item whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Item whereIncomeAccountId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Item whereInventoryStartDate($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Item whereItemTypeId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Item whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Item wherePurchaseCost($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Item wherePurchaseDescription($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Item whereQtyOnHand($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Item whereTaxable($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Item whereTrackQtyOnHand($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Item whereUnitPrice($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Item whereUpdatedAt($value)
 * @mixin \Eloquent
 * @property string|null $sku
 * @property int|null $item_category_id
 * @property int $purchase
 * @property-read \App\Models\Account $asset_account
 * @property-read \App\Models\ItemCategory $category
 * @property-read \App\Models\Account $expense_account
 * @property-read \App\Models\Account $income_account
 * @property-read \App\Models\ItemType $type
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Item whereItemCategoryId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Item wherePurchase($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Item whereSku($value)
 */
	class Item extends Model
	{
		protected $fillable = [
			'item_type_id',
			'item_category_id',
			'name',
			'sku',
			'unit_price',
			'purchase_cost',
			'description',
			'purchase_description',
			'income_account_id',
			'asset_account_id',
			'expense_account_id',
			'taxable',
			'inventory_start_date',
			'qty_on_hand',
			'purchase',
			'track_qty_on_hand',
			'active'
		];
		
		public function type()
		{
			return $this->hasOne(ItemType::class,'id','item_type_id');
		}
		
		public function category()
		{
			return $this->hasOne(ItemCategory::class,'id','item_category_id');
		}
		
		public function income_account()
		{
			return $this->hasOne(Account::class,'id','income_account_id');
		}
		
		public function asset_account()
		{
			return $this->hasOne(Account::class,'id','asset_account_id');
		}
		
		public function expense_account()
		{
			return $this->hasOne(Account::class,'id','expense_account_id');
		}
		
		public function activate()
		{
			$this->active = true;
			$this->save();
		}
		
		public function deactivate()
		{
			$this->active = false;
			$this->save();
		}
	}
