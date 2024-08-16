<?php

declare(strict_types=1);

namespace Shrikeh\App\Command;

use Shrikeh\App\Command\CommandBus\Exception\CommandBusException;
use Shrikeh\App\Message\Command;
use Shrikeh\App\Message\Result;

interface CommandBus
{
    /**
     * @param Command $command
     * @return Result
     * @throws CommandBusException
     */
    public function handle(Command $command): Result;
}
