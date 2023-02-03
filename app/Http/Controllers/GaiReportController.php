<?php

namespace App\Http\Controllers;

use Exception;
use Illuminate\Http\Request;
use Illuminate\Http\JsonResponse;
use App\UseCases\Gai\GetGaiReportUseCase;
use Illuminate\Validation\ValidationException;

class GaiReportController extends Controller
{
    /**
     * @throws ValidationException
     * @throws Exception
     */
    public function getGaiReport(Request $request, GetGaiReportUseCase $getGaiReportUseCase): JsonResponse
    {
        $this->validate($request, [
            'client_id' => ['required', 'min:1'],
            'pin' => ['required', 'min:13'],
        ]);

        $report = $getGaiReportUseCase->execute($request->input('pin'), $request->input('client_id'));

        return response()->json($report);
    }
}
