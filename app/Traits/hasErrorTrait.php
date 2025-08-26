<?php

declare(strict_types=1);

namespace App\Traits;

trait hasErrorTrait
{
    protected array $errors = [];

    public function getErrors(): array
    {
        return $this->errors;
    }
    public function addError(string $error): self
    {
        $this->errors[] = $error;

        return $this;
    }
    public function hasErrors(): bool
    {
        return !empty($this->errors);
    }
}
