<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Database\Eloquent\Relations\HasMany;
use App\Services\Elasticsearch\Enum\SearchTypesEnum;
use App\Services\Elasticsearch\ElasticSearchProvider;
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
 * @property-read Passport|null $passport
 * @property-read Collection|File[] $files
 * @property-read Collection|MibReport[] $mib
 * @property-read Collection|Application[] $applications
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

    public function scopeFilterRequest(Builder $query, Request $request) : Builder
    {
        if ($request->query('q') !== null) {
            if ($q = $request->query('q')) {
                if ($request->query('search_param') == SearchTypesEnum::CLIENT_ID()->getValue()) {
                    $query->where('clients.id', $q);
                } else {
                    $searchProvider = new ElasticSearchProvider();
                    $ids = $searchProvider->search($q, $request->query('search_param'));

                    $placeholders = implode(',', $ids);

                    $query->whereIn('clients.id', $ids);

                    if ($placeholders !== '') {
                        $query->orderByRaw("FIELD(clients.id, {$placeholders})");
                    }
                }
            }
        }

        return $query;
    }
}
