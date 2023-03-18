<?php

namespace App\Services\Elasticsearch\Enum;

use MyCLabs\Enum\Enum;

/**
 * Enum for limit tariff types.
 *
 * @method static self FIO()
 * @method static self PASSPORT()
 * @method static self PHONE()
 * @method static self PINFL()
 * @method static self CLIENT_ID()
 */
class SearchTypesEnum extends Enum
{
    private const FIO = 'fio';
    private const PASSPORT = 'passport';
    private const PHONE = 'phone';
    private const PINFL = 'pinfl';
    private const CLIENT_ID = 'client_id';
}
