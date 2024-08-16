<?php

declare(strict_types=1);

namespace Shrikeh\App\Message;

interface Correlated
{
    public function correlated(): Correlation;

    /**
     * Whether the message has a Correlation
     * @return bool
     */
    public function hasCorrelation(): bool;

    public function withCorrelation(Correlation $correlation): static;
}
