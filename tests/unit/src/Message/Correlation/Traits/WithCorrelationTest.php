<?php

/*
 * This file is part of Barney's Symfony skeleton for Domain-Driven Design
 *
 * (c) Barney Hanlon <symfony@shrikeh.net>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

declare(strict_types=1);

namespace Tests\Unit\Message\Correlation\Traits;

use Prophecy\PhpUnit\ProphecyTrait;
use Shrikeh\App\Exception\ExceptionMessage;
use Shrikeh\App\Message\Correlated;
use Shrikeh\App\Message\Correlation;
use Shrikeh\App\Message\Correlation\CorrelationId;
use Shrikeh\App\Message\Correlation\Exception\CorrelationCannotBeChanged;
use Shrikeh\App\Message\Correlation\Traits\WithCorrelation;
use PHPUnit\Framework\TestCase;

/**
 * @author Barney Hanlon <symfony@shrikeh.net>
 */
final class WithCorrelationTest extends TestCase
{
    use ProphecyTrait;

    public function testItIsCorrelateable(): void
    {
        $correlationId = $this->prophesize(CorrelationId::class)->reveal();
        $correlation = new Correlation($correlationId);
        $uncorrelated = $this->instance();
        $correlated = $uncorrelated->withCorrelation($correlation);

        $this->assertSame($correlation, $correlated->correlated());
        $this->assertNotSame($uncorrelated, $correlated);
    }
    public function testItReturnsFalseIfItHasNoCorrelation(): void
    {
        $this->assertFalse($this->instance()->hasCorrelation());
    }

    public function testItReturnsTrueIfItHasACorrelation(): void
    {
        $correlation = new Correlation(
            $this->prophesize(CorrelationId::class)->reveal(),
        );
        $this->assertTrue($this->instance()->withCorrelation($correlation)->hasCorrelation());
    }

    public function testItThrowsAnExceptionIfItHasACorrelationAndTheyDoNotMatch(): void
    {
        $newCorrelationId = $this->prophesize(CorrelationId::class);
        $newCorrelationId->toString()->willReturn('bar');
        $correlationId = $this->prophesize(CorrelationId::class);
        $correlationId->toString()->willReturn('foo');
        $correlationId->matches($newCorrelationId)->willReturn(false);
        $correlation = new Correlation($correlationId->reveal());
        $newCorrelationId = $newCorrelationId->reveal();
        $newCorrelation = new Correlation($newCorrelationId);

        $correlated = $this->instance()->withCorrelation($correlation);
        $this->expectExceptionObject(new CorrelationCannotBeChanged(
            $correlated,
            $newCorrelation,
        ));

        $this->expectExceptionMessage(
            ExceptionMessage::CORRELATION_CANNOT_BE_CHANGED->message(
                get_class($correlated),
                $correlation->toString(),
                $newCorrelation->toString(),
            ));

        $correlated->withCorrelation($newCorrelation);
    }

    public function testItIgnoresIfTheCorrelationHasAlreadyBeenSet(): void
    {
        $correlationId = $this->prophesize(CorrelationId::class)->reveal();
        $correlation = new Correlation($correlationId);
        $correlated = $this->instance()->withCorrelation($correlation);
        $this->assertSame($correlated, $correlated->withCorrelation($correlation));
    }

    private function instance(): Correlated
    {
        return new class() implements Correlated {
            use WithCorrelation;
        };
    }
}
