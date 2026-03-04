<?php

namespace App\Http\Controllers\Editor;

use App\Http\Controllers\Controller;
use App\Models\TrainingClass;
use App\Models\User;
use App\Services\Certificates\CertificateGenerator;
use Symfony\Component\HttpFoundation\Response;

class CertificateController extends Controller
{
    public function completion(User $teacher, TrainingClass $class, CertificateGenerator $generator): Response
    {
        $pdf = $generator->trainingCompletion($teacher, $class);

        return response($pdf, 200, ['Content-Type' => 'application/pdf']);
    }
}
