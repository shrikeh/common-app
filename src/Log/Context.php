<?php

declare(strict_types=1);

namespace Shrikeh\App\Log;

interface Context
{
    public function toString(): string;
}
