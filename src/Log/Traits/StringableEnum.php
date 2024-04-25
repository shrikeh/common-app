<?php

declare(strict_types=1);

namespace RpHaven\App\Log\Traits;

trait StringableEnum
{
    public function toString(): string
    {
        return $this->value;
    }
}
