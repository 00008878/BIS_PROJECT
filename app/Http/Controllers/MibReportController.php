<?php

namespace App\Http\Controllers;

use Exception;
use Illuminate\Http\Request;
use Illuminate\Http\JsonResponse;
use App\UseCases\Mib\GetMibReportUseCase;
use Illuminate\Validation\ValidationException;

class MibReportController extends Controller
{
    /**
     * @throws ValidationException
     * @throws Exception
     */
    public function getMibReports(Request $request, GetMibReportUseCase $getMibReportUseCase): JsonResponse
    {
        $this->validate($request, [
            'client_id' => ['required', 'min:1'],
            'pin' => ['required', 'min:13'],
        ]);

        $report = $getMibReportUseCase->execute($request->input('pin'), $request->input('client_id'));

        return response()->json($report);
    }
}
