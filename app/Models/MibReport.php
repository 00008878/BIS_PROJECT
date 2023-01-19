<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\MibReport
 *
 * @property int $id
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|MibReport newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|MibReport newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|MibReport query()
 * @method static \Illuminate\Database\Eloquent\Builder|MibReport whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|MibReport whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|MibReport whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class MibReport extends Model
{
    use HasFactory;
}
