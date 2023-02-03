<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;

/**
 * App\Models\MibReport.
 *
 * @property int $id
 * @property int $client_id
 * @property string $debtor_name
 * @property int $debtor_pin
 * @property int $total_debt_sum
 * @property string $debt_type
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * @method static Builder|MibReport newModelQuery()
 * @method static Builder|MibReport newQuery()
 * @method static Builder|MibReport query()
 */
class MibReport extends Model
{
    use HasFactory;
}
