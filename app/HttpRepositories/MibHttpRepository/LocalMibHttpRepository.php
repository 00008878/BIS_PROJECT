<?php

namespace App\HttpRepositories\MibHttpRepository;

use App\HttpRepositories\MibHttpRepository\Responses\MibReportDTO;

class LocalMibHttpRepository implements MibHttpRepositoryInterface
{
    public function getReport(int $pin): MibReportDTO
    {
        $response = [
            'debtor_name' => 'Ulugbek Turakulov',
            'debtor_pin' => 12412312352432,
            'total_debt_sum' => 15000000,
            'debt_type' => 'Fee',
        ];

        return MibReportDTO::fromArray($response);
    }
}
