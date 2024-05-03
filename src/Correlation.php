<?php

declare(strict_types=1);

namespace RpHaven\App;

use DateTimeImmutable;
use RpHaven\App\Correlation\CorrelationId;

final readonly class Correlation
{
    public function __construct(
        public DateTimeImmutable $dateTime,
        public CorrelationId $correlationId,
    ) {

    }

    public function __toString(): string
    {

    }

    public function toString(): string
    {
        return $this->correlationId->toString();
    }
}