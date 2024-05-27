<?php

declare(strict_types=1);

namespace Shrikeh\App\Query;


use Shrikeh\App\Message\Query;
use Shrikeh\App\Message\Result;

interface QueryBus
{
    public function handle(Query $query): Result;
}
