<?php

/*
 * This file is part of Barney's Symfony skeleton for Domain-Driven Design
 *
 * (c) Barney Hanlon <symfony@shrikeh.net>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

declare(strict_types=1);

namespace Shrikeh\App\Message\Correlation\Traits;

use Shrikeh\App\Message\Correlation;
use Shrikeh\App\Message\Correlation\Exception\CorrelationCannotBeChanged;

/**
 * @author Barney Hanlon <symfony@shrikeh.net>
 */
trait WithCorrelation
{
    /** @phpstan-ignore property.uninitializedReadonly */
    private readonly ?Correlation $correlation;

    public function correlated(): Correlation
    {
        return $this->correlation;
    }

    public function withCorrelation(Correlation $correlation): static
    {
        if ($this->hasCorrelation()) {
            if (!$this->correlated()->matches($correlation)) {
                throw new CorrelationCannotBeChanged($this, $correlation);
            }
            return $this;
        }
        $correlated = clone $this;
        /** @phpstan-ignore property.readOnlyAssignNotInConstructor */
        $correlated->correlation = $correlation;

        return $correlated;
    }

    public function hasCorrelation(): bool
    {
        return isset($this->correlation);
    }
}
