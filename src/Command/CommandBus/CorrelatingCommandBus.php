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

namespace Shrikeh\App\Command\CommandBus;

use Shrikeh\App\Command\CommandBus\Exception\CommandBusException;
use Shrikeh\App\Message\Command;
use Shrikeh\App\Message\Correlated;
use Shrikeh\App\Message\Result;

/**
 * @author Barney Hanlon <symfony@shrikeh.net>
 */
interface CorrelatingCommandBus
{
    /**
     * @param Command&Correlated $command
     * @return Result&Correlated
     * @throws CommandBusException
     */
    public function handle(Command&Correlated $command): Result&Correlated;
}
