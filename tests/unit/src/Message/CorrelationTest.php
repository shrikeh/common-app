<?php

declare(strict_types=1);

namespace Tests\Unit\Message;

use DateTimeImmutable;
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

    public function testItCanBeUpdated(): void
    {
        $correlationId = $this->prophesize(CorrelationId::class)->reveal();
        $update = new DateTimeImmutable();

        $correlation = new Correlation($correlationId);

        $this->assertSame(
            $update->format('Y-m-d H:i:s.u'),
            $correlation->update($update)->dateTime->format('Y-m-d H:i:s.u'),
        );

        $this->assertGreaterThan($update, $correlation->update()->dateTime);
    }
}
