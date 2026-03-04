<?php

return [
    'institution_name' => env('TTMS_INSTITUTION_NAME', 'Teacher Training Institute'),
    'certificate_signatory' => env('TTMS_CERTIFICATE_SIGNATORY', 'Director Training'),
    'branding_logo' => env('TTMS_BRANDING_LOGO', '/images/logo.png'),
    'default_class_categories' => [
        'AT',
        'CT',
        'DM',
        'PET',
        'PST',
        'QARI / QARIA',
        'SST (Biology / Chemistry)',
        'SST (General)',
        'SST (Maths / Physics)',
        'TT',
    ],
];
