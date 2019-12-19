<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\Estimate
 *
 * @property int $id
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Estimate newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Estimate newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Estimate query()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Estimate whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Estimate whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Estimate whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class Estimate extends Model
{
	protected $appends =['type'];
	
	public function getTypeAttribute()
	{
		return 'Estimate';
	}
}
