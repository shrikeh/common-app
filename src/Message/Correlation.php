<?php

declare(strict_types=1);

namespace Shrikeh\App\Message;

use DateTimeImmutable;
use Shrikeh\App\Message\Correlation\CorrelationId;
use Stringable;

final readonly class Correlation implements Stringable
{
    public function __construct(
        public CorrelationId $correlationId,
        public DateTimeImmutable $dateTime = new DateTimeImmutable(),
    ) {

    }

    public function __toString(): string
    {
        return $this->toString();
    }

    public function toString(): string
    {
        return $this->correlationId->toString();
    }
}
