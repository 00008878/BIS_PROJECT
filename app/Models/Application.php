<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Builder;
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
 * @property string|null $file_ids
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * @method static Builder|Application newModelQuery()
 * @method static Builder|Application newQuery()
 * @method static Builder|Application query()
 * @method static Builder|Application whereApplicationStatus($value)
 * @method static Builder|Application whereClientId($value)
 * @method static Builder|Application whereCreatedAt($value)
 * @method static Builder|Application whereEngagedAt($value)
 * @method static Builder|Application whereEngagedById($value)
 * @method static Builder|Application whereFileIds($value)
 * @method static Builder|Application whereId($value)
 * @method static Builder|Application whereInvitedClientId($value)
 * @method static Builder|Application whereRejectReason($value)
 * @method static Builder|Application whereServiceType($value)
 * @method static Builder|Application whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class Application extends Model
{
    use HasFactory;
}
