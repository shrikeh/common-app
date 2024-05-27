<?php

declare(strict_types=1);

namespace Shrikeh\App\Log\Traits;

trait StringableEnum
{
    public function toString(): string
    {
        return $this->value;
    }
}
