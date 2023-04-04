<?php

namespace App\UseCases\Applications;

use App\Models\Application;
use App\Models\ApplicationProgress;

class ChangeApplicationStatusUseCase
{
    public function execute(int $application_id, string $application_status): void
    {
        $application = Application::query()->find($application_id);

        $application->application_status = $application_status;
        $application->engaged_by_id = auth()->user()->id;
        $application->engaged_at = now();
        $application->save();

        $progress = ApplicationProgress::query()
            ->where('application_id', '=', $application->id)
            ->first();

        $progress->application_id = $application->id;

        if ($application_status === 'APPROVE') {
            $progress->approved_at = now();
        } else {
            $progress->rejected_at = now();
        }

        $progress->save();
    }
}
