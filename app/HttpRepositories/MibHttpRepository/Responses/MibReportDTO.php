<?php

namespace App\HttpRepositories\MibHttpRepository\Responses;

class MibReportDTO
{
    public function __construct(
        private string $debtor_name,
        private string $debtor_pin,
        private int $total_debt_sum,
        private string $debt_type,
    )
    {
    }

    /**
     * @return string
     */
    public function getDebtorName(): string
    {
        return $this->debtor_name;
    }

    /**
     * @return string
     */
    public function getDebtorPin(): string
    {
        return $this->debtor_pin;
    }

    /**
     * @return int
     */
    public function getTotalDebtSum(): int
    {
        return $this->total_debt_sum;
    }

    /**
     * @return string
     */
    public function getDebtType(): string
    {
        return $this->debt_type;
    }

    public static function fromArray(array $data): static
    {
        return new static(
            debtor_name: (string) $data['debtor_name'],
            debtor_pin: (int) $data['debtor_pin'],
            total_debt_sum: (int) $data['total_debt_sum'],
            debt_type: (string) $data['debt_type'],
        );
    }
}
