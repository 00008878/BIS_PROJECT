<?php

namespace App\UseCases\Identification;

use App\Models\File;

class CheckIdentificationUseCase
{
    public function execute(File $file): int
    {
        return rand(0, 1);
    }
}
