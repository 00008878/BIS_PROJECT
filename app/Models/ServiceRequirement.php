<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;

/**
 * App\Models\ServiceRequirement.
 *
 * @property int $id
 * @property int $service_id
 * @property string $title
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * @property-read Service|null $service
 * @method static Builder|ServiceRequirement newModelQuery()
 * @method static Builder|ServiceRequirement newQuery()
 * @method static Builder|ServiceRequirement query()
 */
class ServiceRequirement extends Model
{
    use HasFactory;

    public function service(): BelongsTo
    {
        return $this->belongsTo(Service::class);
    }
}
