<?php

namespace Tests\Unit;

use App\Services\WinCalculator;
use PHPUnit\Framework\TestCase;

class WinCalculatorTest extends TestCase
{

    public function testWinCalculator(): void
    {
        $calculator = new WinCalculator();

        $this->assertEquals(0, $calculator->calculate(1));
        $this->assertEquals(0, $calculator->calculate(601));
        $this->assertEquals(0, $calculator->calculate(301));
        $this->assertEquals(0, $calculator->calculate(901));

        $this->assertEquals(63140, $calculator->calculate(902));
        $this->assertEquals(70000, $calculator->calculate(1000));

        $this->assertEquals(30100, $calculator->calculate(602));
        $this->assertEquals(45000, $calculator->calculate(900));

        $this->assertEquals(9060, $calculator->calculate(302));
        $this->assertEquals(18000, $calculator->calculate(600));

        $this->assertEquals(20, $calculator->calculate(2));
        $this->assertEquals(3000, $calculator->calculate(300));
    }

}
