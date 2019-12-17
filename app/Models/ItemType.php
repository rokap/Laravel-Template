<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\ItemType
 *
 * @property int $id
 * @property string $name
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\ItemType newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\ItemType newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\ItemType query()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\ItemType whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\ItemType whereName($value)
 * @mixin \Eloquent
 */
class ItemType extends Model
{
	public $timestamps = null;
    protected $fillable = ['name'];
}
