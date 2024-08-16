<?php

declare(strict_types=1);

namespace Tests\Unit\Message;

use PHPUnit\Framework\TestCase;
use Prophecy\PhpUnit\ProphecyTrait;
use Shrikeh\App\Message\Correlation;
use Shrikeh\App\Message\Correlation\CorrelationId;
use Symfony\Component\Uid\Ulid;

final class CorrelationTest extends TestCase
{
    use ProphecyTrait;

    public function testItBehavesAsAString(): void
    {
        $ulid = Ulid::generate();
        $correlationId = $this->prophesize(CorrelationId::class);
        $correlationId->toString()->willReturn($ulid);

        $correlation = new Correlation($correlationId->reveal());

        $this->assertSame($ulid, $correlation->toString());
        $this->assertSame($ulid, (string) $correlation);
    }

    public fun
}
