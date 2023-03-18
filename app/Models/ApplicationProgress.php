<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;

/**
 * App\Models\ApplicationProgress.
 *
 * @property int $id
 * @property int $application_id
 * @property Carbon|null $application_created_at
 * @property Carbon|null $reviewed_at
 * @property Carbon|null $approved_at
 * @property Carbon|null $rejected_at
 * @property Carbon|null $completed_at
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * @method static Builder|ApplicationProgress newModelQuery()
 * @method static Builder|ApplicationProgress newQuery()
 * @method static Builder|ApplicationProgress query()
 * @method static Builder|ApplicationProgress whereApplicationCreatedAt($value)
 * @method static Builder|ApplicationProgress whereApplicationId($value)
 * @method static Builder|ApplicationProgress whereApprovedAt($value)
 * @method static Builder|ApplicationProgress whereCompletedAt($value)
 * @method static Builder|ApplicationProgress whereCreatedAt($value)
 * @method static Builder|ApplicationProgress whereId($value)
 * @method static Builder|ApplicationProgress whereRejectedAt($value)
 * @method static Builder|ApplicationProgress whereReviewedAt($value)
 * @method static Builder|ApplicationProgress whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class ApplicationProgress extends Model
{
    use HasFactory;
}
