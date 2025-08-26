<?php

declare(strict_types=1);

namespace App\DTOs;

readonly class TaskDTO
{
    public function __construct(
        public string $title,
        public string $status,
    )
    {
    }
}
