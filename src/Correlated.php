<?php

declare(strict_types=1);

namespace RpHaven\App;

interface Correlated
{
    public function correlated(): Correlation;
}