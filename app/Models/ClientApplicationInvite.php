<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;

/**
 * App\Models\ClientApplicationInvite.
 *
 * @property int $id
 * @property int $application_id
 * @property int $from_client_id
 * @property int $to_client_id
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * @method static Builder|ClientApplicationInvite newModelQuery()
 * @method static Builder|ClientApplicationInvite newQuery()
 * @method static Builder|ClientApplicationInvite query()
 */
class ClientApplicationInvite extends Model
{
    use HasFactory;
}
