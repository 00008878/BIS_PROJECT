<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Factories\HasFactory;

/**
 * App\Models\Application.
 *
 * @property int $id
 * @property int $client_id
 * @property int|null $invited_client_id
 * @property int $service_type
 * @property int|null $engaged_by_id
 * @property string|null $engaged_at
 * @property string $application_status
 * @property string|null $reject_reason
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * @method static Builder|Application newModelQuery()
 * @method static Builder|Application newQuery()
 * @method static Builder|Application query()
 */
class Application extends Model
{
    use HasFactory;

    public function files(): HasMany
    {
        return $this->hasMany(File::class);
    }
}
