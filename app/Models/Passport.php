<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;

/**
 * App\Models\Passport.
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
 * @method static Builder|Passport whereAddress($value)
 * @method static Builder|Passport whereBirthDate($value)
 * @method static Builder|Passport whereCityName($value)
 * @method static Builder|Passport whereClientId($value)
 * @method static Builder|Passport whereCreatedAt($value)
 * @method static Builder|Passport whereExpiryDate($value)
 * @method static Builder|Passport whereGender($value)
 * @method static Builder|Passport whereId($value)
 * @method static Builder|Passport whereIssueDate($value)
 * @method static Builder|Passport whereName($value)
 * @method static Builder|Passport whereNationalityName($value)
 * @method static Builder|Passport wherePatronymic($value)
 * @method static Builder|Passport wherePinfl($value)
 * @method static Builder|Passport whereRegion($value)
 * @method static Builder|Passport whereSerialNumber($value)
 * @method static Builder|Passport whereSurname($value)
 * @method static Builder|Passport whereType($value)
 * @method static Builder|Passport whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class Passport extends Model
{
    use HasFactory;
}
