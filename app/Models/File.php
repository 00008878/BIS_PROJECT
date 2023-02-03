<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;

/**
 * App\Models\File.
 *
 * @property int $id
 * @property int $client_id
 * @property string $file_name
 * @property string $file_type
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * @method static Builder|File newModelQuery()
 * @method static Builder|File newQuery()
 * @method static Builder|File query()
 * @method static Builder|File whereClientId($value)
 * @method static Builder|File whereCreatedAt($value)
 * @method static Builder|File whereFileName($value)
 * @method static Builder|File whereFileType($value)
 * @method static Builder|File whereId($value)
 * @method static Builder|File whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class File extends Model
{
    use HasFactory;
}
