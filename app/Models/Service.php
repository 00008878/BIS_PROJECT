<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Factories\HasFactory;

/**
 * App\Models\Service.
 *
 * @property int $id
 * @property string $category
 * @property string $type
 * @property float $price
 * @property bool $two_sided
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * @property-read Collection|ServiceRequirement[] $service_requirements
 * @property-read int|null $service_requirements_count
 * @method static Builder|Service newModelQuery()
 * @method static Builder|Service newQuery()
 * @method static Builder|Service query()
 */
class Service extends Model
{
    use HasFactory;

    public function service_requirements(): HasMany
    {
        return $this->hasMany(ServiceRequirement::class);
    }
}
