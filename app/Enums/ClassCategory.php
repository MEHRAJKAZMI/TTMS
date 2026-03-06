<?php

namespace App\Enums;

enum ClassCategory: string
{
    case AT = 'AT';
    case CT = 'CT';
    case DM = 'DM';
    case PET = 'PET';
    case PST = 'PST';
    case QARI_QARIA = 'QARI / QARIA';
    case SST_BIO_CHEM = 'SST (Biology / Chemistry)';
    case SST_GENERAL = 'SST (General)';
    case SST_MATH_PHYS = 'SST (Maths / Physics)';
    case TT = 'TT';
}
