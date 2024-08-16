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

namespace Shrikeh\App\Exception;

/**
 * @author Barney Hanlon <symfony@shrikeh.net>
 */
enum Message: string implements AppExceptionMessage
{
    case CORRELATION_CANNOT_BE_CHANGED = 'Message of type %s has existing Correlation of %s but attempted to set new Correlation %s';


    public function message(string ...$args): string
    {
        return sprintf($this->value, ...$args);
    }
}
