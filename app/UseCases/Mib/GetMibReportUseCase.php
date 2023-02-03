<?php

namespace App\UseCases\Mib;

use Exception;
use App\Models\MibReport;
use Illuminate\Http\Client\RequestException;
use App\HttpRepositories\MibHttpRepository\MibHttpRepository;

class GetMibReportUseCase
{
    public function __construct(
        private MibHttpRepository $mibHttpRepository
    )
    {
    }

    /**
     * @throws Exception
     */
    public function execute(int $pin, int $client_id): MibReport
    {
        try {
            $response = $this->mibHttpRepository->getReport($pin);

            $mib_report = new MibReport();
            $mib_report->client_id = $client_id;
            $mib_report->debtor_name = $response->getDebtorName();
            $mib_report->debtor_pin = $response->getDebtorPin();
            $mib_report->debt_type = $response->getDebtType();
            $mib_report->total_debt_sum = $response->getTotalDebtSum();
            $mib_report->save();

            return $mib_report;
        } catch (RequestException $exception) {
            throw new Exception('Could not get MIB report');
        }
    }
}
