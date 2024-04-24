<?php

declare(strict_types=1);

namespace RpHaven\App\Bus;

use RpHaven\App\Command;
use RpHaven\App\Command\CommandBus;
use RpHaven\App\Result;
use Symfony\Component\Messenger\HandleTrait;
use Symfony\Component\Messenger\MessageBusInterface;
use Throwable;

final class SymfonyCommandBus implements CommandBus
{
    use HandleTrait {
        handle as handleCommand;
    }
    public function __construct(MessageBusInterface $commandBus)
    {
        $this->messageBus = $commandBus;
    }

    public function handle(Command $command): Result|null
    {
        try {
            return $this->handleCommand($command);
        } catch (Throwable $exc) {

        }

    }
}