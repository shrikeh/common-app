<?php

declare(strict_types=1);

namespace RpHaven\App\Command;

use RpHaven\App\Command\CommandBus\Exception\CommandBusException;
use RpHaven\App\Message\Command;
use RpHaven\App\Message\Result;

interface CommandBus
{
    /**
     * @param Command $command
     * @return Result|null
     * @throws CommandBusException
     */
    public function handle(Command $command): ?Result;
}