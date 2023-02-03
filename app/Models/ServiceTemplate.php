<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

/**
 * App\Models\ServiceTemplate.
 *
 * @property int $id
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|ServiceTemplate newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|ServiceTemplate newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|ServiceTemplate query()
 * @method static \Illuminate\Database\Eloquent\Builder|ServiceTemplate whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ServiceTemplate whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ServiceTemplate whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class ServiceTemplate extends Model
{
    use HasFactory;
}
