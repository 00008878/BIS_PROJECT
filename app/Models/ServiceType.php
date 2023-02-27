<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;

/**
 * App\Models\ServiceType.
 *
 * @property int $id
 * @property string $type_name
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * @method static Builder|ServiceType newModelQuery()
 * @method static Builder|ServiceType newQuery()
 * @method static Builder|ServiceType query()
 */
class ServiceType extends Model
{
    use HasFactory;
}
