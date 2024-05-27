<?php

declare(strict_types=1);

namespace Shrikeh\App\Log\Context;

use Shrikeh\App\Log\Context;
use Shrikeh\App\Log\Traits\StringableEnum;

enum App: string implements Context
{
    use StringableEnum;

    case COMMAND_HANDLER = 'command_handler';
    case QUERY_HANDLER = 'query_handler';
}
