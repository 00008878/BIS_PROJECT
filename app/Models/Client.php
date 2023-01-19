<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;

/**
 * App\Models\Client
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
}
