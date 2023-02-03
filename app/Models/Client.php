<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Builder;
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
 * @method static Builder|Client whereBirthdate($value)
 * @method static Builder|Client whereClientStatus($value)
 * @method static Builder|Client whereCreatedAt($value)
 * @method static Builder|Client whereEngagedAt($value)
 * @method static Builder|Client whereEngagedById($value)
 * @method static Builder|Client whereGender($value)
 * @method static Builder|Client whereId($value)
 * @method static Builder|Client whereName($value)
 * @method static Builder|Client wherePatronymic($value)
 * @method static Builder|Client wherePhone($value)
 * @method static Builder|Client whereSurname($value)
 * @method static Builder|Client whereUpdatedAt($value)
 * @method static Builder|Client whereUserId($value)
 * @mixin \Eloquent
 */
class Client extends Model
{
    use HasFactory;
}
