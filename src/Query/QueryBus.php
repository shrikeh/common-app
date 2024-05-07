<?php

declare(strict_types=1);

namespace RpHaven\App\Query;


use RpHaven\App\Message\Query;
use RpHaven\App\Message\Result;

interface QueryBus
{
    public function handle(Query $query): Result;
}