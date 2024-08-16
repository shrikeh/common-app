<?php

declare(strict_types=1);

namespace Shrikeh\App\Message\Correlation;

use Stringable;

interface CorrelationId extends Stringable
{
    public function toString(): string;

    public function matches(CorrelationId $correlationId): bool;
}
