<?php

namespace App\HttpRepositories\MibHttpRepository;

use Illuminate\Support\Facades\Http;
use Illuminate\Http\Client\PendingRequest;
use Illuminate\Http\Client\RequestException;
use App\HttpRepositories\MibHttpRepository\Responses\MibReportDTO;

class MibHttpRepository
{
    /**
     * @throws RequestException
     */
    public function getReport(int $pin): MibReportDTO
    {
        $response = $this->baseRequest()
            ->post('/debt', ['pin' => $pin])
            ->throw()
            ->json();

        return MibReportDTO::fromArray($response);
    }

    public function baseRequest(): PendingRequest
    {
        return Http::baseUrl(config('services.mib.domain'))
            ->acceptJson();
    }
}
