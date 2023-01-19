<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\ServiceType
 *
 * @property int $id
 * @property string $type_name
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|ServiceType newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|ServiceType newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|ServiceType query()
 * @method static \Illuminate\Database\Eloquent\Builder|ServiceType whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ServiceType whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ServiceType whereTypeName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ServiceType whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class ServiceType extends Model
{
    use HasFactory;
}
