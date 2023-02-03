<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;

/**
 * App\Models\GaiReport.
 *
 * @property int $id
 * @property int $client_id
 * @property string $license_plate_num
 * @property string $car_mark
 * @property string $car_color
 * @property string $car_model
 * @property string $reg_no
 * @property int $year_of_manufacture
 * @property string $tech_inspect_date_start
 * @property string $tech_inspect_date_end
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * @method static Builder|GaiReport newModelQuery()
 * @method static Builder|GaiReport newQuery()
 * @method static Builder|GaiReport query()
 */
class GaiReport extends Model
{
    use HasFactory;
}
