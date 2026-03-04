<?php

namespace App\Services\Certificates;

use App\Models\TrainingClass;
use App\Models\User;
use Barryvdh\DomPDF\Facade\Pdf;

class CertificateGenerator
{
    public function trainingCompletion(User $teacher, TrainingClass $class): string
    {
        $pdf = Pdf::loadView('certificates.training_completion', compact('teacher', 'class'));

        return $pdf->output();
    }

    public function dmc(User $teacher, TrainingClass $class, array $subjects): string
    {
        $pdf = Pdf::loadView('dmc.show', compact('teacher', 'class', 'subjects'));

        return $pdf->output();
    }
}
