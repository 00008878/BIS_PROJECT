<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\ClientOffense
 *
 * @property int $id
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|ClientOffense newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|ClientOffense newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|ClientOffense query()
 * @method static \Illuminate\Database\Eloquent\Builder|ClientOffense whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ClientOffense whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ClientOffense whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class ClientOffense extends Model
{
    use HasFactory;
}
