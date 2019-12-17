<?php
	
	namespace App\Models;
	
	use Illuminate\Database\Eloquent\Model;
	
	/**
 * App\Models\ItemCategory
 *
 * @property int $id
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property int|null $parent_category_id
 * @property string $name
 * @property int $order
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\Item[] $items
 * @property-read int|null $items_count
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\ItemCategory[] $sub_categories
 * @property-read int|null $sub_categories_count
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\ItemCategory newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\ItemCategory newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\ItemCategory query()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\ItemCategory whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\ItemCategory whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\ItemCategory whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\ItemCategory whereOrder($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\ItemCategory whereParentCategoryId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\ItemCategory whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class ItemCategory extends Model
	{
		
		public function items()
		{
			return $this->hasMany(Item::class, 'item_category_id', 'id')->orderBy('name', 'asc');
		}
		
		public function sub_categories()
		{
			return $this->hasMany(ItemCategory::class, 'parent_category_id', 'id');
		}
	}
