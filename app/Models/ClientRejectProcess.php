<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

/**
 * App\Models\ClientRejectProcess.
 *
 * @property int $id
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|ClientRejectProcess newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|ClientRejectProcess newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|ClientRejectProcess query()
 * @method static \Illuminate\Database\Eloquent\Builder|ClientRejectProcess whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ClientRejectProcess whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ClientRejectProcess whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class ClientRejectProcess extends Model
{
    use HasFactory;
}
