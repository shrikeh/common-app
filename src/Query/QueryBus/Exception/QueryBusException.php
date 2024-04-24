<?php

declare(strict_types=1);

namespace RpHaven\App\Query\QueryBus\Exception;

use RpHaven\App\Command\Exception\CommandException;

interface QueryBusException extends CommandException
{

}