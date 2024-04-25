<?php

declare(strict_types=1);

namespace Tests\Mocks;

use RpHaven\App\Log\Context;
use RpHaven\App\Log\Traits\ContextEnum;

enum MockContextEnum: string implements Context
{
    use ContextEnum;

    case FOO = 'bar';
}
