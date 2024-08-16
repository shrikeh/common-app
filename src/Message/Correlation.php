<?php

declare(strict_types=1);

namespace Shrikeh\App\Message;

use DateTimeImmutable;
use DateTimeInterface;
use Shrikeh\App\Message\Correlation\CorrelationId;
use Stringable;

final readonly class Correlation implements Stringable
{
    public DateTimeImmutable $dateTime;

    public function __construct(
        public CorrelationId $correlationId,
        DateTimeInterface $dateTime = new DateTimeImmutable(),
    ) {
        $this->dateTime = DateTimeImmutable::createFromInterface($dateTime);
    }

    public function __toString(): string
    {
        return $this->toString();
    }

    public function toString(): string
    {
        return $this->correlationId->toString();
    }

    public function update(DateTimeInterface $dateTime = new DateTimeImmutable()): self
    {
        return new self($this->correlationId, $dateTime);
    }

    public function matches(Correlation $correlation): bool
    {
        return ($correlation === $this) || $this->correlationId->matches($correlation->correlationId);
    }
}
