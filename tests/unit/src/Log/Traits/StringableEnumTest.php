<?php

declare(strict_types=1);

namespace Tests\Unit\Log\Traits;

use Shrikeh\App\Log\Traits\StringableEnum;
use PHPUnit\Framework\TestCase;

final class StringableEnumTest extends TestCase
{
    public function testItIsStringable(): void
    {
        $stringable = new class () {
            use StringableEnum;

            public string $value = 'foo';
        };

        $enum = new $stringable();

        $this->assertSame('foo', $enum->toString());
    }
}
