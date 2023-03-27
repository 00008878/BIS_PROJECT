<?php

namespace App\HttpRepositories\GaiHttpRepository;

use App\HttpRepositories\GaiHttpRepository\Responses\GaiReportDTO;

class LocalGaiHttpRepository implements GaiHttpRepositoryInterface
{
    public function getReport(int $pin): GaiReportDTO
    {
        $response = [
            'license_plate_num' => '01A123AA',
            'car_mark' => 'Nexia',
            'car_color' => 'white',
            'car_model' => 'Chevrolet',
            'reg_no' => 'AAB1234123',
            'year_of_manufacture' => 2022,
            'tech_inspect_date_start' => now(),
            'tech_inspect_date_end' => now()->addYears(3),
        ];

        return GaiReportDTO::fromArray($response);
    }
}
