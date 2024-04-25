<?php

declare(strict_types=1);

namespace RpHaven\App\Log;

interface Context
{
    public function toString(): string;
}