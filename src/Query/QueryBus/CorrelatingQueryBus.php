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

namespace Shrikeh\App\Query\QueryBus;

use Shrikeh\App\Message\Correlated;
use Shrikeh\App\Message\Query;
use Shrikeh\App\Message\Result;

/**
 * @author Barney Hanlon <symfony@shrikeh.net>
 */
interface CorrelatingQueryBus
{
    /**
     * @param Correlated&Query $query
     * @return Result&Correlated
     */
    public function handle(Query&Correlated $query): Result&Correlated;
}
