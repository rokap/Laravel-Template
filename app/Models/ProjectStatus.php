<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\ProjectStatus
 *
 * @property int $id
 * @property string $name
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\ProjectStatus newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\ProjectStatus newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\ProjectStatus query()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\ProjectStatus whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\ProjectStatus whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\ProjectStatus whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\ProjectStatus whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class ProjectStatus extends Model
{
}
