<?php

namespace App\Enums;

use BenSampo\Enum\Contracts\LocalizedEnum;
use BenSampo\Enum\Enum;

final class CommonStatus extends Enum implements LocalizedEnum
{
    const ACTIVE = 1;
    const DELETED = -1;
}
