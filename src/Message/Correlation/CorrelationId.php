<?php

declare(strict_types=1);

namespace RpHaven\App\Message\Correlation;

use Stringable;

interface CorrelationId extends Stringable
{
    public function toString(): string;
}