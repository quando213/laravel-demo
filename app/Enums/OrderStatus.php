<?php

namespace App\Enums;

use BenSampo\Enum\Contracts\LocalizedEnum;
use BenSampo\Enum\Enum;

final class OrderStatus extends Enum implements LocalizedEnum
{
    const WAITING = 1;
    const PROCESSING = 2;
    const SHIPPING = 3;
    const DONE = 4;
    const REJECTED = -1;
}
