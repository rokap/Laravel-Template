<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\AccountTransaction
 *
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\AccountTransaction newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\AccountTransaction newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\AccountTransaction query()
 * @mixin \Eloquent
 * @property int $id
 * @property int $account_id
 * @property float $amount
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\AccountTransaction whereAccountId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\AccountTransaction whereAmount($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\AccountTransaction whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\AccountTransaction whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\AccountTransaction whereUpdatedAt($value)
 * @property int|null $item_id
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\AccountTransaction whereItemId($value)
 */
class AccountTransaction extends Model
{
    protected $fillable = [
    	'account_id',
    	'amount',
    ];
}
