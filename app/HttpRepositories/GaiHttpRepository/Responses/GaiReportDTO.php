<?php

namespace App\HttpRepositories\GaiHttpRepository\Responses;

use Carbon\Carbon;

class GaiReportDTO
{
    public function __construct(
        private string $license_plate_num,
        private string $car_mark,
        private string $car_color,
        private string $car_model,
        private string $reg_no,
        private int $year_of_manufacture,
        private Carbon $tech_inspect_date_start,
        private Carbon $tech_inspect_date_end,
    )
    {
    }

    /**
     * @return string
     */
    public function getLicensePlateNum(): string
    {
        return $this->license_plate_num;
    }

    /**
     * @return string
     */
    public function getCarMark(): string
    {
        return $this->car_mark;
    }

    /**
     * @return string
     */
    public function getCarColor(): string
    {
        return $this->car_color;
    }

    /**
     * @return string
     */
    public function getCarModel(): string
    {
        return $this->car_model;
    }

    /**
     * @return string
     */
    public function getRegNo(): string
    {
        return $this->reg_no;
    }

    /**
     * @return int
     */
    public function getYearOfManufacture(): int
    {
        return $this->year_of_manufacture;
    }

    /**
     * @return Carbon
     */
    public function getTechInspectDateStart(): Carbon
    {
        return $this->tech_inspect_date_start;
    }

    /**
     * @return Carbon
     */
    public function getTechInspectDateEnd(): Carbon
    {
        return $this->tech_inspect_date_end;
    }

    public static function fromArray(array $data): static
    {
        return new static(
            license_plate_num: (string) $data['license_plate_num'],
            car_mark: (string) $data['car_mark'],
            car_color: (string) $data['car_color'],
            car_model: (string) $data['car_model'],
            reg_no: (string) $data['reg_no'],
            year_of_manufacture: (int) $data['year_of_manufacture'],
            tech_inspect_date_start: Carbon::parse($data['tech_inspect_date_start']),
            tech_inspect_date_end: Carbon::parse($data['tech_inspect_date_end']),
        );
    }
}
