<?php

namespace App\HttpRepositories\GaiHttpRepository;

use App\HttpRepositories\GaiHttpRepository\Responses\GaiReportDTO;

class LocalGaiHttpRepository implements GaiHttpRepositoryInterface
{
    public function getReport(int $pin): GaiReportDTO
    {
        $response = [];

        return GaiReportDTO::fromArray($response);
    }
}
