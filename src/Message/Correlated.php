<?php

declare(strict_types=1);

namespace RpHaven\App\Message;

interface Correlated
{
    public function correlated(): Correlation;
}