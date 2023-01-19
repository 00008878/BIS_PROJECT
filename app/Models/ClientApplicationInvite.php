<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\ClientApplicationInvite
 *
 * @property int $id
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|ClientApplicationInvite newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|ClientApplicationInvite newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|ClientApplicationInvite query()
 * @method static \Illuminate\Database\Eloquent\Builder|ClientApplicationInvite whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ClientApplicationInvite whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ClientApplicationInvite whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class ClientApplicationInvite extends Model
{
    use HasFactory;
}
