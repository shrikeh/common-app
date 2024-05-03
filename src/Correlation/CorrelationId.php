<?php

declare(strict_types=1);

namespace RpHaven\App\Correlation;

use Stringable;

interface CorrelationId extends Stringable
{
    public function toString(): string;
}