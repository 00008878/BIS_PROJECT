<?php

declare(strict_types=1);

namespace App\HttpRepositories\Centrifugo;

use Exception;
use Illuminate\Http\Client\PendingRequest;
use Illuminate\Support\Facades\Http;

class CentrifugoHttpRepository
{
    public function publish(mixed $data, string $channel): void
    {
        try {
            $this->baseRequest()
                ->post('api', [
                    'method' => 'publish',
                    'params' => [
                        'channel' => $channel,
                        'data' => [
                            'value' => $data,
                        ],
                    ],
                ]);
        } catch (Exception) {
            // do nothing
        }
    }

    public function baseRequest(): PendingRequest
    {
        return Http::baseUrl(config('services.centrifugo.domain'))
            ->acceptJson()
            ->withHeaders([
                'Content-type' => 'application/json',
                'Authorization' => 'apikey ' . config('services.centrifugo.auth_api_key'),
            ])
            ->timeout(10);
    }
}
