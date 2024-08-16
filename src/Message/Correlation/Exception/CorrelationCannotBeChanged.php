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

namespace Shrikeh\App\Message\Correlation\Exception;

use RuntimeException;
use Shrikeh\App\Exception\Message;
use Shrikeh\App\Message\Correlated;
use Shrikeh\App\Message\Correlation;

/**
 * @author Barney Hanlon <symfony@shrikeh.net>
 */
final class CorrelationCannotBeChanged extends RuntimeException implements CorrelationException
{
    public function __construct(
        public readonly Correlated $cqrs,
        public readonly Correlation $new,
    ) {
        parent::__construct(sprintf(Message::CORRELATION_CANNOT_BE_CHANGED->message(
            get_class($this->cqrs),
            $this->cqrs->correlated()->toString(),
            $this->new->toString(),
        )));
    }
}
