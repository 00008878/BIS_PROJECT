<?php

namespace App\HttpRepositories\MibHttpRepository;

use App\HttpRepositories\MibHttpRepository\Responses\MibReportDTO;

class LocalMibHttpRepository implements MibHttpRepositoryInterface
{
    public function getReport(int $pin): MibReportDTO
    {
        $response = [];

        return MibReportDTO::fromArray($response);
    }
}
