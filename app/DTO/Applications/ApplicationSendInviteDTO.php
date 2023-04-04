<?php

namespace App\DTO\Applications;

final class ApplicationSendInviteDTO
{
    public function __construct(
        private int $pinfl,
        private int $application_id,
        private int $client_id,
    ) {
    }

    /**
     * @return int
     */
    public function getPinfl(): int
    {
        return $this->pinfl;
    }

    /**
     * @return int
     */
    public function getApplicationId(): int
    {
        return $this->application_id;
    }

    /**
     * @return int
     */
    public function getClientId(): int
    {
        return $this->client_id;
    }

    public static function fromArray(array $data): static
    {
        return new static(
            pinfl: (int) $data['pinfl'],
            application_id: (int) $data['application_id'],
            client_id: (int) $data['client_id'],
        );
    }
}
