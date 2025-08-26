<?php

declare(strict_types=1);

namespace App\Enum;

enum StatusTaskEnum: string
{
    case PENDING = 'pending';
    case DONE = 'done';

}
