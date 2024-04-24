<?php

declare(strict_types=1);

namespace RpHaven\App\Query;


use RpHaven\App\Query;
use RpHaven\App\Result;

interface QueryBus
{
    public function handle(Query $query): Result;
}