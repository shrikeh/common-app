<?php

declare(strict_types=1);

namespace RpHaven\App\Log\Level;

use RpHaven\App\Log\Level;
use RpHaven\App\Log\Traits\StringableEnum;

enum Psr3: string implements Level
{
    use StringableEnum;
    case EMERGENCY = 'emergency';
    case ALERT     = 'alert';
    case CRITICAL  = 'critical';
    case ERROR     = 'error';
    case WARNING   = 'warning';
    case NOTICE    = 'notice';
    case INFO      = 'info';
    case DEBUG     = 'debug';
}
