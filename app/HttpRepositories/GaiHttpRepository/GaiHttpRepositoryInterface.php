<?php

namespace App\HttpRepositories\GaiHttpRepository;

use App\HttpRepositories\GaiHttpRepository\Responses\GaiReportDTO;

interface GaiHttpRepositoryInterface
{
    public function getReport(int $pin): GaiReportDTO;
}
