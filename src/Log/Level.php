<?php

declare(strict_types=1);

namespace Shrikeh\App\Log;

interface Level
{
    public function toString(): string;
}
