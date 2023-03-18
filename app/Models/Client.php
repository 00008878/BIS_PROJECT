<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Factories\HasFactory;

/**
 * App\Models\Client.
 *
 * @property int $id
 * @property int $user_id
 * @property string $name
 * @property string $surname
 * @property string|null $patronymic
 * @property string $phone
 * @property int|null $engaged_by_id
 * @property string|null $engaged_at
 * @property string $client_status
 * @property string $birthdate
 * @property string $gender
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * @method static Builder|Client newModelQuery()
 * @method static Builder|Client newQuery()
 * @method static Builder|Client query()
 */
class Client extends Model
{
    use HasFactory;

    public function files(): HasMany
    {
        return $this->hasMany(File::class);
    }

    public function passport(): HasOne
    {
        return $this->hasOne(Passport::class);
    }

    public function mib(): HasMany
    {
        return $this->hasMany(MibReport::class);
    }

    public function applications(): HasMany
    {
        return $this->hasMany(Application::class);
    }
}
