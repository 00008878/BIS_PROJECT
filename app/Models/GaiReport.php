<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\GaiReport
 *
 * @property int $id
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|GaiReport newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|GaiReport newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|GaiReport query()
 * @method static \Illuminate\Database\Eloquent\Builder|GaiReport whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|GaiReport whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|GaiReport whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class GaiReport extends Model
{
    use HasFactory;
}
