<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\ServiceRequiredDocument
 *
 * @property int $id
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|ServiceRequiredDocument newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|ServiceRequiredDocument newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|ServiceRequiredDocument query()
 * @method static \Illuminate\Database\Eloquent\Builder|ServiceRequiredDocument whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ServiceRequiredDocument whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ServiceRequiredDocument whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class ServiceRequiredDocument extends Model
{
    use HasFactory;
}
