<?php

use App\Http\Controllers\Teacher\EnrollmentController;

it('contains enrollment guard clauses for duplicates and capacity', function (): void {
    $source = file_get_contents(app_path('Http/Controllers/Teacher/EnrollmentController.php'));

    expect($source)->toContain('already enrolled');
    expect($source)->toContain('capacity has been reached');
    expect($source)->toContain('enrollment.created');
    expect(EnrollmentController::class)->toBeString();
});
