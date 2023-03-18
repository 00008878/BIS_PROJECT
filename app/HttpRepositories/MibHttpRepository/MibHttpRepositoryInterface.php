<?php

namespace App\HttpRepositories\MibHttpRepository;

use App\HttpRepositories\MibHttpRepository\Responses\MibReportDTO;

interface MibHttpRepositoryInterface
{
    public function getReport(int $pin): MibReportDTO;
}
