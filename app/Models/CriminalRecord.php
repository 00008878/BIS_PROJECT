<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\CriminalRecord
 *
 * @property int $id
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|CriminalRecord newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|CriminalRecord newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|CriminalRecord query()
 * @method static \Illuminate\Database\Eloquent\Builder|CriminalRecord whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|CriminalRecord whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|CriminalRecord whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class CriminalRecord extends Model
{
    use HasFactory;
}
