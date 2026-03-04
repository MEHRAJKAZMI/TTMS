<?php

namespace App\Http\Controllers\Editor;

use App\Http\Controllers\Controller;
use App\Models\TrainingClass;
use App\Services\Reports\ReportExportService;
use Symfony\Component\HttpFoundation\Response;

class ReportController extends Controller
{
    public function classSummaryPdf(TrainingClass $class, ReportExportService $exportService): Response
    {
        $pdf = $exportService->classSummaryPdf($class);

        return response($pdf, 200, ['Content-Type' => 'application/pdf']);
    }
}
