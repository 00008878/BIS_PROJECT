<?php

namespace App\HttpRepositories\GaiHttpRepository;

use Illuminate\Support\Facades\Http;
use Illuminate\Http\Client\PendingRequest;
use Illuminate\Http\Client\RequestException;
use App\HttpRepositories\GaiHttpRepository\Responses\GaiReportDTO;

class GaiHttpRepository
{
    /**
     * @throws RequestException
     */
    public function getReport(int $pin): GaiReportDTO
    {
        $response = $this->baseRequest()
            ->post('/vehicle-info', ['pin' => $pin])
            ->throw()
            ->json();

        return GaiReportDTO::fromArray($response);
    }

    public function baseRequest(): PendingRequest
    {
        return Http::baseUrl(config('services.gai.domain'))
            ->acceptJson();
    }
}
