<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;

/**
 * App\Models\Application
 *
 * @property int $id
 * @property int $client_id
 * @property int|null $invited_client_id
 * @property int $service_type
 * @property int|null $engaged_by_id
 * @property string|null $engaged_at
 * @property string $application_status
 * @property string|null $reject_reason
 * @property string|null $file_ids
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * @method static Builder|Application newModelQuery()
 * @method static Builder|Application newQuery()
 * @method static Builder|Application query()
 */
class Application extends Model
{
    use HasFactory;
}
