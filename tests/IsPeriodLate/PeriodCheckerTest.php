<?php

namespace Katas\Tests\IsPeriodLate;

use DateTime;
use Katas\IsPeriodLate\PeriodChecker;
use PHPUnit\Framework\TestCase;

class PeriodCheckerTest extends TestCase
{
    private $checker;

    protected function setUp()
    {
        $this->checker = new PeriodChecker();
    }

    public function testNotLateIfTodayAndLastMatches()
    {
        $this->assertNotLate('2019-07-28', '2019-07-28', 0);
    }

    public function testNotLateIfTodayLesserThanLastPeriod()
    {
        $this->assertNotLate('2019-07-28', '2019-07-20', 1);
    }

    public function testLateIfPassedDaysLargerThanCycleLength()
    {
        $this->assertLate('2019-07-28', '2019-07-30', 1);
    }

    private function assertNotLate(string $last, string $today, int $cycleLength): void
    {
        $lastPeriod = new DateTime($last);
        $today = new DateTime($today);
        $this->assertFalse($this->checker->isLate($lastPeriod, $today, $cycleLength));
    }

    private function assertLate(string $last, string $today, int $cycleLength): void
    {
        $lastPeriod = new DateTime($last);
        $today = new DateTime($today);
        $this->assertTrue($this->checker->isLate($lastPeriod, $today, $cycleLength));
    }
}
