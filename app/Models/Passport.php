<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;

/**
 * App\Models\Passport
 *
 * @property int $id
 * @property int $client_id
 * @property string $serial_number
 * @property int $pinfl
 * @property string|null $name
 * @property string|null $surname
 * @property string|null $patronymic
 * @property Carbon|null $birth_date
 * @property string|null $gender
 * @property Carbon $issue_date
 * @property Carbon $expiry_date
 * @property string $address
 * @property string $region
 * @property string $city_name
 * @property string $nationality_name
 * @property string $type
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * @method static Builder|Passport newModelQuery()
 * @method static Builder|Passport newQuery()
 * @method static Builder|Passport query()
 */
class Passport extends Model
{
    use HasFactory;
}
