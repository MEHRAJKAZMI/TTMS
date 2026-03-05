<?php

use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\TrainingClassController;
use App\Http\Controllers\Editor\CertificateController;
use App\Http\Controllers\Editor\ReportController;
use App\Http\Controllers\Teacher\EnrollmentController;
use App\Http\Controllers\Trainer\AssessmentController;
use App\Http\Controllers\Trainer\AttendanceController;
use Illuminate\Support\Facades\Route;

Route::get('/', fn () => view('welcome'));

Route::middleware(['auth'])->group(function (): void {
    Route::middleware('role:admin')->prefix('admin')->name('admin.')->group(function (): void {
        Route::get('/dashboard', DashboardController::class)->name('dashboard');
        Route::get('/classes', [TrainingClassController::class, 'index'])->name('classes.index');
        Route::post('/classes', [TrainingClassController::class, 'store'])->name('classes.store');
    });

    Route::middleware('role:trainer')->prefix('trainer')->name('trainer.')->group(function (): void {
        Route::post('/attendance', [AttendanceController::class, 'store'])->name('attendance.store');
        Route::post('/results', [AssessmentController::class, 'storeResult'])->name('results.store');
    });

    Route::middleware('role:teacher')->prefix('teacher')->name('teacher.')->group(function (): void {
        Route::post('/classes/{class}/enroll', [EnrollmentController::class, 'store'])->name('classes.enroll');
    });

    Route::middleware('role:editor|admin')->prefix('editor')->name('editor.')->group(function (): void {
        Route::get('/certificates/{teacher}/{class}', [CertificateController::class, 'completion'])->name('certificates.completion');
        Route::get('/reports/classes/{class}/pdf', [ReportController::class, 'classSummaryPdf'])->name('reports.class.pdf');
    });
});
