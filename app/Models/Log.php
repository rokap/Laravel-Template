<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\Log
 *
 * @property int $id
 * @property int $user_id
 * @property string $type
 * @property string $message
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Log newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Log newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Log query()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Log whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Log whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Log whereMessage($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Log whereType($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Log whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Log whereUserId($value)
 * @mixin \Eloquent
 */
class Log extends Model
{
    protected $fillable = [
    	'user_id',
    	'type',
    	'message',
    ];
}
