<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

/**
 * App\Models\ApplicationSession.
 *
 * @property int $id
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|ApplicationSession newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|ApplicationSession newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|ApplicationSession query()
 * @method static \Illuminate\Database\Eloquent\Builder|ApplicationSession whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ApplicationSession whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ApplicationSession whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class ApplicationSession extends Model
{
    use HasFactory;
}
