<?php declare(strict_types=1);

use PHPUnit\Framework\TestCase;
use App\Invest;

final class InvestTest extends TestCase
{
    public function testInstance(): void
    {
        $this->assertInstanceOf(
            Invest::class,
            Invest::start()
        );
    }

    public function testCannotBeCreatedFromInvalidValues(): void
    {
        $this->expectException(InvalidArgumentException::class);

        Invest::start()
            ->setMaxAmount(1000)
            ->setDates('10.01.2021', 2020)
            ->setPercents(3, '6')
            ->setAmountsToTranches(500)
            ->calculate();
    }

    public function testCanBeCreatedFromValidValues(): void
    {
        $this->expectException(InvalidArgumentException::class);

        Invest::start()
            ->setMaxAmount(1000)
            ->setDates('10.01.2021', '15.11.2021')
            ->setPercents(3, 6)
            ->setAmountsToTranches([
                Invest::TRANCHE_A => 500,
                Invest::TRANCHE_B => 600
            ])
            ->calculate();
    }
}