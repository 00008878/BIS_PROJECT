<?php

namespace App\UseCases\Gai;

use Exception;
use App\Models\GaiReport;
use Illuminate\Http\Client\RequestException;
use App\HttpRepositories\GaiHttpRepository\GaiHttpRepositoryInterface;

class GetGaiReportUseCase
{
    public function __construct(
        private GaiHttpRepositoryInterface $gaiHttpRepository
    )
    {
    }

    /**
     * @throws Exception
     */
    public function execute(int $pin, int $client_id): GaiReport
    {
        try {
            $response = $this->gaiHttpRepository->getReport($pin);

            $gai_report = new GaiReport();
            $gai_report->client_id = $client_id;
            $gai_report->license_plate_num = $response->getLicensePlateNum();
            $gai_report->car_color = $response->getCarColor();
            $gai_report->car_mark = $response->getCarMark();
            $gai_report->car_model = $response->getCarModel();
            $gai_report->reg_no = $response->getRegNo();
            $gai_report->year_of_manufacture = $response->getYearOfManufacture();
            $gai_report->tech_inspect_date_start = $response->getTechInspectDateStart();
            $gai_report->tech_inspect_date_end = $response->getTechInspectDateEnd();
            $gai_report->save();

            return $gai_report;
        } catch (RequestException $exception) {
            throw new Exception('Could not get MIB report');
        }
    }
}
