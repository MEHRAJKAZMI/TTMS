<?php

namespace App\Services\Reports;

use App\Models\TrainingClass;
use Barryvdh\DomPDF\Facade\Pdf;
use Maatwebsite\Excel\Facades\Excel;

class ReportExportService
{
    public function classSummaryPdf(TrainingClass $class): string
    {
        return Pdf::loadView('reports.class_summary', ['class' => $class])->output();
    }

    public function exportClassSummaryExcel(string $exportClass, TrainingClass $class): mixed
    {
        return Excel::download(new $exportClass($class), "class-summary-{$class->id}.xlsx");
    }
}
