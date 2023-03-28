<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;

/**
 * App\Models\ClientApplicationInvite.
 *
 * @property int $id
 * @property int $application_id
 * @property int $from_client_id
 * @property int $to_client_id
 * @property bool $active
 * @property-read Client|null $client_from
 * @property-read Client|null $client_to
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * @method static Builder|ClientApplicationInvite newModelQuery()
 * @method static Builder|ClientApplicationInvite newQuery()
 * @method static Builder|ClientApplicationInvite query()
 */
class ClientApplicationInvite extends Model
{
    use HasFactory;

    public function client_from(): BelongsTo
    {
        return $this->belongsTo(Client::class, 'from_client_id');
    }

    public function client_to(): BelongsTo
    {
        return $this->belongsTo(Client::class, 'to_client_id');
    }
}
